// resources/js/contact.js
/* =========================================================
   VOCABOT — CONTACT FORM (jQuery Validation & AJAX)
   ========================================================= */

(function (init) {
  if (typeof jQuery !== "undefined") {
    jQuery(init);
  } else {
    document.addEventListener("DOMContentLoaded", function () {
      if (typeof jQuery !== "undefined") {
        jQuery(init);
      } else {
        console.error("jQuery is required for Vocabot contact form validation.");
      }
    });
  }
})(function ($) {
  "use strict";

  const $form = $("#contactForm");
  if (!$form.length) return;

  // 1. Disable native HTML5 form validation
  $form.attr("novalidate", "novalidate");

  const $status = $("#formStatus");
  const $submitBtn = $("#submitBtn").length
    ? $("#submitBtn")
    : $form.find('button[type="submit"]');
  const originalBtnHtml = $submitBtn.length
    ? $submitBtn.html()
    : 'Send Message <span>&rarr;</span>';

  let isSubmitting = false;

  // 6. Email format validation regex
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  // Ensure submit button is enabled on load
  if ($submitBtn.length) {
    $submitBtn.prop("disabled", false);
  }

  // 5. Display custom validation error messages next to or below their respective fields
  function showFieldError(fieldName, message) {
    let $errDiv = $("#error-" + fieldName);
    if (!$errDiv.length) {
      if (fieldName === "subject") $errDiv = $("#error-interest");
      else if (fieldName === "interest") $errDiv = $("#error-subject");
      else if (fieldName === "name") $errDiv = $("#error-firstName");
    }
    if (!$errDiv.length) {
      $errDiv = $form
        .find('[name="' + fieldName + '"], #' + fieldName)
        .closest(".form-group")
        .find(".error-message");
    }

    if ($errDiv.length) {
      $errDiv.text(message).show();
    }

    $form
      .find('[name="' + fieldName + '"], #' + fieldName)
      .addClass("is-invalid");
  }

  // 7. Remove the error message when the user starts correcting the corresponding field
  function clearFieldError(fieldName) {
    $("#error-" + fieldName).text("").hide();
    if (fieldName === "subject") $("#error-interest").text("").hide();
    if (fieldName === "interest") $("#error-subject").text("").hide();
    if (fieldName === "name") $("#error-firstName").text("").hide();

    $form
      .find('[name="' + fieldName + '"], #' + fieldName)
      .removeClass("is-invalid");

    // If all field errors are cleared, remove generic status error text
    let hasAnyError = false;
    $form.find(".error-message").each(function () {
      if ($.trim($(this).text()).length > 0) {
        hasAnyError = true;
        return false;
      }
    });
    if (!hasAnyError && $status.hasClass("error")) {
      clearStatus();
    }
  }

  function clearAllFieldErrors() {
    $form.find(".error-message").text("").hide();
    $form.find("input, textarea, select").removeClass("is-invalid");
  }

  function clearStatus() {
    if ($status.length) {
      $status.text("").removeClass("success error").css("color", "").hide();
    }
  }

  // 10. Prevent multiple submissions while an AJAX request is in progress
  function setLoading(isLoading) {
    isSubmitting = isLoading;
    if (!$submitBtn.length) return;

    if (isLoading) {
      $submitBtn.prop("disabled", true);
      $submitBtn.css({ opacity: "0.7", cursor: "not-allowed" });
      $submitBtn.html(
        '<i class="ri-loader-4-line ri-spin" style="margin-right: 8px;"></i> Sending...'
      );

      if ($status.length) {
        $status
          .removeClass("success error")
          .text("Sending your message...")
          .css("color", "#b990ff")
          .show();
      }
    } else {
      $submitBtn.prop("disabled", false);
      $submitBtn.css({ opacity: "1", cursor: "pointer" });
      $submitBtn.html(originalBtnHtml);
    }
  }

  // Clear error message on input or change
  $form.on("input change", "input, textarea, select", function () {
    const fieldName = $(this).attr("name") || $(this).attr("id");
    if (fieldName) {
      clearFieldError(fieldName);
    }
  });

  // Handle form submission
  $form.on("submit", function (event) {
    // 3. Prevent default native form submission
    event.preventDefault();

    // Prevent multiple submissions while an AJAX request is in progress
    if (isSubmitting) {
      return false;
    }

    clearAllFieldErrors();
    clearStatus();

    // 4. Validate all required fields, including name, email, subject, and message
    let isValid = true;

    // First Name / Name validation
    const $firstNameInput = $("#firstName");
    const firstName = $firstNameInput.length ? $.trim($firstNameInput.val()) : "";
    if ($firstNameInput.length && $firstNameInput.prop("required")) {
      if (!firstName) {
        showFieldError("firstName", "Please enter your first name.");
        isValid = false;
      }
    }

    // Last Name validation
    const $lastNameInput = $("#lastName");
    const lastName = $lastNameInput.length ? $.trim($lastNameInput.val()) : "";
    if ($lastNameInput.length && $lastNameInput.prop("required")) {
      if (!lastName) {
        showFieldError("lastName", "Please enter your last name.");
        isValid = false;
      }
    }

    // General Name validation (if form uses single name field)
    const $nameInput = $("#name");
    const name = $nameInput.length ? $.trim($nameInput.val()) : "";
    if ($nameInput.length && $nameInput.prop("required") && !$firstNameInput.length) {
      if (!name) {
        showFieldError("name", "Please enter your name.");
        isValid = false;
      }
    }

    // Email validation
    const $emailInput = $("#email");
    const email = $emailInput.length ? $.trim($emailInput.val()) : "";
    if ($emailInput.length) {
      if (!email) {
        showFieldError("email", "Please enter your email address.");
        isValid = false;
      } else if (!emailPattern.test(email)) {
        showFieldError("email", "Please enter a valid email address.");
        isValid = false;
      }
    }

    // Subject / Interest validation
    const $interestSelect = $("#interest");
    const interest = $interestSelect.length ? $.trim($interestSelect.val() || "") : "";
    const $subjectInput = $("#subject");
    const subject = $subjectInput.length ? $.trim($subjectInput.val() || "") : "";

    if ($interestSelect.length && $interestSelect.prop("required")) {
      if (!interest) {
        showFieldError("interest", "Please select what we can help with.");
        isValid = false;
      }
    } else if ($subjectInput.length && $subjectInput.prop("required")) {
      if (!subject) {
        showFieldError("subject", "Please enter a subject.");
        isValid = false;
      }
    }

    // Message validation
    const $messageInput = $("#message");
    const message = $messageInput.length ? $.trim($messageInput.val()) : "";
    if ($messageInput.length && $messageInput.prop("required")) {
      if (!message) {
        showFieldError("message", "Please enter your message.");
        isValid = false;
      }
    }

    // Company (optional)
    const $companyInput = $("#company");
    const company = $companyInput.length ? $.trim($companyInput.val()) : "";

    // If client validation fails, display overall error and stop
    if (!isValid) {
      if ($status.length) {
        $status
          .removeClass("success")
          .addClass("error")
          .text("Please correct the errors above and try again.")
          .css("color", "#ff8a8a")
          .show();
      }
      return false;
    }

    // 8. Submit through AJAX only when all fields pass validation
    const csrfToken =
      $('meta[name="csrf-token"]').attr("content") ||
      $form.find('input[name="_token"]').val() ||
      "";

    const payload = {
      firstName: firstName,
      lastName: lastName,
      name: name || (firstName ? (firstName + " " + lastName).trim() : ""),
      email: email,
      company: company,
      interest: interest || subject,
      subject: subject || interest,
      message: message,
      _token: csrfToken,
    };

    setLoading(true);

    $.ajax({
      url: $form.attr("action") || "/contact",
      type: "POST",
      data: JSON.stringify(payload),
      contentType: "application/json; charset=UTF-8",
      headers: {
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": csrfToken,
      },
      success: function (data) {
        if (data && data.success !== false) {
          // Reset form fields
          $form[0].reset();
          clearAllFieldErrors();

          if ($interestSelect.length) {
            $interestSelect.prop("selectedIndex", 0);
          }

          // 9. Display success message without reloading
          if ($status.length) {
            $status
              .removeClass("error")
              .addClass("success")
              .text(
                data.message ||
                  "Thank you! Your message has been received successfully."
              )
              .css("color", "#4cd964")
              .show();

            if ($status[0].scrollIntoView) {
              $status[0].scrollIntoView({ behavior: "smooth", block: "nearest" });
            }
          }
        } else {
          if ($status.length) {
            $status
              .removeClass("success")
              .addClass("error")
              .text(
                (data && data.message) ||
                  "An unexpected error occurred. Please try again."
              )
              .css("color", "#ff8a8a")
              .show();
          }
        }
      },
      error: function (xhr) {
        let responseData = {};
        try {
          responseData =
            xhr.responseJSON || (xhr.responseText ? JSON.parse(xhr.responseText) : {});
        } catch (e) {
          responseData = {};
        }

        // 9. Display appropriate server-side error messages without reloading
        if (xhr.status === 422) {
          const errors = responseData.errors || {};
          $.each(errors, function (field, msgs) {
            const msg = Array.isArray(msgs) ? msgs[0] : msgs;
            showFieldError(field, msg || "Invalid input.");
          });

          if ($status.length) {
            $status
              .removeClass("success")
              .addClass("error")
              .text(
                responseData.message ||
                  "Please correct the errors above and try again."
              )
              .css("color", "#ff8a8a")
              .show();
          }
        } else if (xhr.status === 419) {
          if ($status.length) {
            $status
              .removeClass("success")
              .addClass("error")
              .text("Your session has expired. Please refresh the page and try again.")
              .css("color", "#ff8a8a")
              .show();
          }
        } else if (xhr.status >= 500) {
          if ($status.length) {
            $status
              .removeClass("success")
              .addClass("error")
              .text(
                responseData.message ||
                  "A database or server error occurred. Please try again shortly."
              )
              .css("color", "#ff8a8a")
              .show();
          }
        } else {
          if ($status.length) {
            $status
              .removeClass("success")
              .addClass("error")
              .text(
                responseData.message ||
                  "An unexpected error occurred. Please try again."
              )
              .css("color", "#ff8a8a")
              .show();
          }
        }
      },
      complete: function () {
        setLoading(false);
      },
    });
  });
});
