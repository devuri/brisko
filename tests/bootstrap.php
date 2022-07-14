<?php

\define('BRISKO_TEST_MODE', true);
\define('BRISKO_INTEGRATION_MODE', false); // true to run integration tests.
\define('BRISKO_API_TEST_KEY', getenv('BRISKO_API_TEST_KEY'));

// github actions environment variables.
\define('BRISKO_GITHUB_EVENT_NAME', getenv('GITHUB_EVENT_NAME'));
\define('BRISKO_GITHUB_REF', getenv('GITHUB_REF'));
\define('BRISKO_GITHUB_EVENT_PATH', getenv('GITHUB_EVENT_PATH'));
\define('BRISKO_GITHUB_HEAD_REF', getenv('GITHUB_HEAD_REF'));
\define('BRISKO_RUNNER_OS', getenv('RUNNER_OS'));
