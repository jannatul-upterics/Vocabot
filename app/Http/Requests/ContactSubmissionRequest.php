<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $rawEmail = $this->input('email')
            ?? $this->input('Work Email')
            ?? $this->input('work_email')
            ?? $this->input('Email');

        $rawFirstName = $this->input('firstName')
            ?? $this->input('First Name')
            ?? $this->input('first_name');

        $rawLastName = $this->input('lastName')
            ?? $this->input('Last Name')
            ?? $this->input('last_name');

        $rawName = $this->input('name')
            ?? $this->input('Full Name')
            ?? $this->input('full_name');

        $rawInterest = $this->input('interest')
            ?? $this->input('Interested In')
            ?? $this->input('subject')
            ?? $this->input('Subject');

        $rawPhone = $this->input('phone')
            ?? $this->input('Phone')
            ?? $this->input('phoneNumber')
            ?? $this->input('Phone Number');

        $rawMessage = $this->input('message')
            ?? $this->input('Message');

        if ($rawPhone && strtolower(trim((string) $rawPhone)) === 'not provided') {
            $rawPhone = null;
        }

        if ($rawMessage && strtolower(trim((string) $rawMessage)) === 'not provided') {
            $rawMessage = null;
        }

        $merge = [];
        if ($rawEmail !== null) {
            $merge['email'] = trim((string) $rawEmail);
        }
        if ($rawFirstName !== null) {
            $merge['firstName'] = trim((string) $rawFirstName);
        }
        if ($rawLastName !== null) {
            $merge['lastName'] = trim((string) $rawLastName);
        }
        if ($rawName !== null) {
            $merge['name'] = trim((string) $rawName);
        }
        if ($rawInterest !== null) {
            $merge['interest'] = trim((string) $rawInterest);
        }
        if ($rawPhone !== null) {
            $merge['phone'] = trim((string) $rawPhone);
        }
        if ($rawMessage !== null) {
            $merge['message'] = trim((string) $rawMessage);
        }

        $this->merge($merge);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['nullable', 'string', 'max:120', 'required_without:name'],
            'lastName' => ['nullable', 'string', 'max:120'],
            'name' => ['nullable', 'string', 'max:255', 'required_without:firstName'],
            'email' => ['required', 'string', 'email:rfc', 'max:255'],
            'interest' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50', 'regex:/^(?:\+?1[\s.-]?)?(?:\(?\d{3}\)?[\s.-]?)\d{3}[\s.-]?\d{4}$/'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.regex' => 'Please enter a valid US phone number (e.g. +1 555 123 4567).',
            'interest.required' => 'Please select what we can help you with.',
            'firstName.required_without' => 'Please enter your first name.',
            'name.required_without' => 'Please enter your name.',
        ];
    }
}
