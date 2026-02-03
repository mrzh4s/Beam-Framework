<?php
/**
 * Inertia Helper Functions
 * File: apps/core/helpers/inertia.php
 *
 * Global helper functions for Inertia.js integration
 */
use Vireo\Framework\View\Inertia;

if (!function_exists('inertia')) {
    /**
     * Create an Inertia response
     *
     * @param string $component Component name
     * @param array $props Component props
     * @return void
     */
    function inertia($component, $props = []) {
        return Inertia::render($component, $props);
    }
}

if (!function_exists('inertia_location')) {
    /**
     * Redirect to external URL (Inertia-aware)
     *
     * @param string $url
     * @return void
     */
    function inertia_location($url) {
        return Inertia::location($url);
    }
}

if (!function_exists('inertia_lazy')) {
    /**
     * Create a lazy prop (only loaded on partial reload)
     *
     * @param callable $callback
     * @return array
     */
    function inertia_lazy($callback) {
        return Inertia::lazy($callback);
    }
}

if (!function_exists('inertia_flash')) {
    /**
     * Flash a message to the next Inertia response
     *
     * Usage:
     * inertia_flash('success', 'User created successfully!')
     * inertia_flash('error', 'Something went wrong')
     *
     * @param string $key Flash key (success, error, warning, info)
     * @param string $message Message content
     * @return void
     */
    function inertia_flash($key, $message) {
        return Inertia::flash($key, $message);
    }
}

if (!function_exists('inertia_errors')) {
    /**
     * Flash validation errors to the next Inertia response
     *
     * Usage:
     * inertia_errors(['email' => 'Email is required', 'password' => 'Password is required'])
     *
     * @param array $errors Validation errors
     * @return void
     */
    function inertia_errors($errors) {
        return Inertia::flashErrors($errors);
    }
}

if (!function_exists('inertia_old')) {
    /**
     * Flash old input to the next Inertia response
     * Used for form repopulation after validation errors
     *
     * Usage:
     * inertia_old($_POST)
     *
     * @param array $input Old input data
     * @return void
     */
    function inertia_old($input) {
        return Inertia::flashOld($input);
    }
}

// ============== CONVENIENCE FLASH HELPERS ==============

if (!function_exists('flash_success')) {
    /**
     * Flash a success message for Inertia
     *
     * Usage:
     * flash_success('User created successfully!')
     *
     * @param string $message Success message
     * @return void
     */
    function flash_success($message) {
        return Inertia::flash('success', $message);
    }
}

if (!function_exists('flash_error')) {
    /**
     * Flash an error message for Inertia
     *
     * Usage:
     * flash_error('Something went wrong')
     *
     * @param string $message Error message
     * @return void
     */
    function flash_error($message) {
        return Inertia::flash('error', $message);
    }
}

if (!function_exists('flash_warning')) {
    /**
     * Flash a warning message for Inertia
     *
     * Usage:
     * flash_warning('This action cannot be undone')
     *
     * @param string $message Warning message
     * @return void
     */
    function flash_warning($message) {
        return Inertia::flash('warning', $message);
    }
}

if (!function_exists('flash_info')) {
    /**
     * Flash an info message for Inertia
     *
     * Usage:
     * flash_info('Check your email for confirmation')
     *
     * @param string $message Info message
     * @return void
     */
    function flash_info($message) {
        return Inertia::flash('info', $message);
    }
}

// ============== REDIRECT WITH FLASH HELPERS ==============

if (!function_exists('redirect_with_success')) {
    /**
     * Redirect with success flash message
     *
     * Usage:
     * redirect_with_success('/dashboard', 'Login successful!')
     *
     * @param string $url URL to redirect to
     * @param string $message Success message
     * @param int $statusCode HTTP status code
     * @return void
     */
    function redirect_with_success($url, $message, $statusCode = 302) {
        flash_success($message);
        header("Location: $url", true, $statusCode);
        exit;
    }
}

if (!function_exists('redirect_with_error')) {
    /**
     * Redirect with error flash message
     *
     * Usage:
     * redirect_with_error('/login', 'Invalid credentials')
     *
     * @param string $url URL to redirect to
     * @param string $message Error message
     * @param int $statusCode HTTP status code
     * @return void
     */
    function redirect_with_error($url, $message, $statusCode = 302) {
        flash_error($message);
        header("Location: $url", true, $statusCode);
        exit;
    }
}
