// resources/js/contact.js
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    if (!form) return;

    const status = document.getElementById('formStatus');
    const submitBtn = document.getElementById('submitBtn') || form.querySelector('button[type="submit"]');

    if (submitBtn) {
        submitBtn.disabled = false;
    }

    const originalBtnHtml = submitBtn ? submitBtn.innerHTML : 'Send Message <span>&rarr;</span>';

    const clearFieldErrors = () => {
        const errorDivs = form.querySelectorAll('.error-message');
        errorDivs.forEach((div) => {
            div.textContent = '';
        });
    };

    const clearStatus = () => {
        if (status) {
            status.textContent = '';
            status.className = 'form-status';
            status.style.color = '';
        }
    };

    const setLoading = (isLoading) => {
        if (!submitBtn) return;
        if (isLoading) {
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
            submitBtn.style.cursor = 'not-allowed';
            submitBtn.innerHTML = '<i class="ri-loader-4-line ri-spin" style="margin-right: 8px;"></i> Sending...';
            if (status) {
                status.textContent = 'Sending your message...';
                status.className = 'form-status';
                status.style.color = '#b990ff';
            }
        } else {
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
            submitBtn.style.cursor = 'pointer';
            submitBtn.innerHTML = originalBtnHtml;
        }
    };

    // Remove field error on input/change
    form.querySelectorAll('input, textarea, select').forEach((element) => {
        const clearFieldError = () => {
            const errDiv = document.getElementById('error-' + element.name);
            if (errDiv) {
                errDiv.textContent = '';
            }
        };
        element.addEventListener('input', clearFieldError);
        element.addEventListener('change', clearFieldError);
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        clearFieldErrors();
        clearStatus();
        setLoading(true);

        const firstName = document.getElementById('firstName')?.value?.trim() || '';
        const lastName = document.getElementById('lastName')?.value?.trim() || '';
        const email = document.getElementById('email')?.value?.trim() || '';
        const company = document.getElementById('company')?.value?.trim() || '';
        const interest = document.getElementById('interest')?.value || '';
        const message = document.getElementById('message')?.value?.trim() || '';

        const csrfToken =
            document.querySelector('meta[name="csrf-token"]')?.content ||
            form.querySelector('input[name="_token"]')?.value ||
            '';

        const payload = {
            firstName,
            lastName,
            email,
            company,
            interest,
            message,
            _token: csrfToken,
        };

        fetch(form.action || '/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(payload),
        })
            .then(async (response) => {
                let data = {};
                try {
                    data = await response.json();
                } catch (e) {
                    data = {};
                }
                return { ok: response.ok, status: response.status, data };
            })
            .then(({ ok, status: statusCode, data }) => {
                if (ok && data.success !== false) {
                    form.reset();
                    clearFieldErrors();

                    const selectEl = document.getElementById('interest');
                    if (selectEl) {
                        selectEl.selectedIndex = 0;
                    }

                    if (status) {
                        status.textContent = data.message || 'Thank you! Your message has been received successfully.';
                        status.className = 'form-status success';
                        status.style.color = '#4cd964';
                        status.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                } else if (statusCode === 422) {
                    const errors = data.errors || {};
                    Object.entries(errors).forEach(([field, msgs]) => {
                        const errDiv = document.getElementById('error-' + field);
                        if (errDiv) {
                            errDiv.textContent = msgs[0] || '';
                        }
                    });

                    if (status) {
                        status.textContent = data.message || 'Please correct the errors above and try again.';
                        status.className = 'form-status error';
                        status.style.color = '#ff8a8a';
                    }
                } else if (statusCode === 419) {
                    if (status) {
                        status.textContent = 'Your session has expired. Please refresh the page and try again.';
                        status.className = 'form-status error';
                        status.style.color = '#ff8a8a';
                    }
                } else if (statusCode >= 500) {
                    if (status) {
                        status.textContent = data.message || 'A database or server error occurred. Please try again shortly.';
                        status.className = 'form-status error';
                        status.style.color = '#ff8a8a';
                    }
                } else {
                    if (status) {
                        status.textContent = data.message || 'An unexpected error occurred. Please try again.';
                        status.className = 'form-status error';
                        status.style.color = '#ff8a8a';
                    }
                }
            })
            .catch((error) => {
                console.error('Form submission network error:', error);
                if (status) {
                    status.textContent = 'Network error. Please check your connection and try again.';
                    status.className = 'form-status error';
                    status.style.color = '#ff8a8a';
                }
            })
            .finally(() => {
                setLoading(false);
            });
    });
});
