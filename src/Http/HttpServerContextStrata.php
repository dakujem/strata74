<?php

declare(strict_types=1);

namespace Dakujem\Strata\Http;

use Dakujem\Strata\Support\ContextStrata;
use Dakujem\Strata\Support\SuggestsErrorMessage;
use Dakujem\Strata\Support\SuggestsHttpStatus;
use Dakujem\Strata\Support\SupportsInternalContext;
use Dakujem\Strata\Support\SupportsInternalExplanation;
use Dakujem\Strata\Support\SupportsPublicContext;
use Dakujem\Strata\Support\SupportsPublicConveying;
use Dakujem\Strata\Support\SupportsTagging;
use Throwable;

/**
 * Base trait for 5xx HTTP exceptions with rich context support.
 *
 * Implements the following interfaces:
 * @see SupportsPublicContext
 * @see SupportsPublicConveying
 * @see SupportsInternalContext
 * @see SupportsInternalExplanation
 * @see SupportsTagging
 * @see SuggestsHttpStatus
 * @see SuggestsErrorMessage
 */
trait HttpServerContextStrata
{
    use ContextStrata;

    public function __construct($message = null, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?? $this->suggestErrorMessage(), $code ?? 0, $previous);
    }

    public function suggestErrorMessage(): string
    {
        return 'Internal server error';
    }

    public function suggestStatusCode(): int
    {
        return 500; // 500 Internal Server Error
    }

    /**
     * Gets the exception's internal message.
     * This method is natively implemented by exceptions and errors in PHP.
     */
//    abstract public function getMessage();
}
