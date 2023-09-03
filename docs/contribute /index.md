# Contributing 
Welcome! We're excited that you're interested in contributing to our WordPress theme. By contributing, you can help improve the functionality, fix bugs, and add new features to the theme. This document will guide you through the process of contributing.
> **Note** Please only install the Beta theme on a test site. By their nature, Beta releases could be unstable and should not be used on a site where your data is important.

## Table of Contents

- [Getting Started](#getting-started)
- [Reporting Issues](#reporting-issues)
- [Bug Fixes](#bug-fixes)
- [Feature Requests](#feature-requests)
- [Submitting Changes](#submitting-changes)
- [Coding Guidelines](#coding-guidelines)
- [Code Review](#code-review)
- [Conventional Commits](#conventional-commits)
- [Testing](#testing)
- [Pull Requests](#pull-requests)
- [Continuous Integration](#continuous-integration)
- [Documentation](#documentation)
- [Community Guidelines](#community-guidelines)
- [Miscellaneous](#miscellaneous)
- [Acknowledgments](#acknowledgments)
- [License](#license)

## Getting Started

> First Interaction: Read our welcome and [first interaction](https://devuri.github.io/brisko/contribute/welcome/) file if this is your first time contributing. 

To get started with contributing to our WordPress theme, follow these steps:

1. Fork the repository on GitHub.
2. Clone the forked repository to your local development environment.
3. Install the required dependencies and set up your development environment as per the provided instructions.
4. Create a new branch for your changes.
5. Run `composer build` this will check and format your code, it will also run basic unit tests and static analysis.

Brisko requires the following **development** dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

To start development using all the tools, you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

## Reporting Issues

If you encounter any issues with the theme, please report them using GitHub Issues. When reporting an issue, provide as much information as possible, including:

- A clear and descriptive title
- Detailed steps to reproduce the issue
- Any relevant error messages or screenshots

## Bug Fixes

If you'd like to fix a bug in the theme, follow these steps:

1. Check the list of open issues or create a new issue if it doesn't already exist.
2. Assign the issue to yourself (if it isn't already assigned).
3. Fork the repository and clone it to your local machine.
4. Create a new branch for your bug fix.
5. Make the necessary changes to fix the bug.
6. Write tests to verify the bug fix, if applicable.
7. Commit your changes and push them to your forked repository.
8. Submit a pull request to the main repository, referencing the issue you fixed.

## Feature Requests

If you have a feature request for the theme, please follow these steps:

1. Check the list of open feature requests or create a new one if it doesn't already exist.
2. Provide a clear and detailed description of the feature you'd like to see added.
3. Explain why you believe the feature would be beneficial.
4. Engage in any discussion around the feature request if required.

## Submitting Changes

When you're ready to submit your changes, please follow these steps:

1. Ensure your code follows the coding guidelines (see [Coding Guidelines](#coding-guidelines)).
2. Commit your changes with clear and descriptive commit messages.
3. Push your changes to your forked repository.
4. Submit a pull request to the main repository.
5. Provide a detailed description of the changes you made and why they are necessary.
6. Be responsive to any feedback or comments on your pull request.

## Coding Guidelines

To maintain consistency and readability of the codebase, please adhere to the following coding guidelines:

- Follow the WordPress Coding Standards (Unless otherwise mentioned): [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- Use clear and descriptive variable and function names.
- Comment your code when necessary to explain complex logic or non-obvious behavior.
- Keep your codebase clean and free of unnecessary dependencies or unused code.
- We try to avoid `final`.
- Always add native types where possible.
- Always use strict comparisons ` === `.
- If a method returns nothing, it should be indicated with void
- You should type hint a property whenever possible.
- Each applied trait should go on its own line, and the use keyword should be used for each of them.
- We avoid using `else`, else makes code less readable, replace using `early returns` or using a ternary.
- Separate if statements should be preferred over a compound condition.
- The PHP 4-style "var" declaration must not be used.
- Be mindfull about removing code: A quick way to gauge the use of a function can be to search for it in OpenGrok and [WPDirectory](https://wpdirectory.net/).

**We adopted a coding standard for all the usual reasons:**

Code conventions improve the readability of the software, allowing engineers to understand new code more quickly and thoroughly. If you ship your source code as a product, you need to make sure it is as well packaged and clean as any other product you create.
https://en.wikipedia.org/wiki/Coding_conventions.

Coding standards, Coding best practices are a set of informal rules that the software development community employs to help improve software quality.
https://en.wikipedia.org/wiki/Coding_best_practices

 > **Note** Code styling doesn't need to be  perfect. We can automatically apply style fix with`composer codefix` and `composer wpcs-fix` (you should probably do this locally before you submit pull request).

## Code Review
Code review is an important and widely adopted practice, and there are numerous how-to guides that teach best practices. They’re all valuable, but what’s most important, I think, is the mindset. If a team shares a positive approach to code reviews, a lot of the benefits of best practice automatically apply. It fundamentally changes how you experience code review, and its effectiveness.
[The Code Review Mindset](https://medium.engineering/the-code-review-mindset-3280a4af0a89)

## Conventional Commits

We use Conventional Commits, this helps with releases automation and CHANGELOG.

Release Please assumes you are using [Conventional Commit messages](https://www.conventionalcommits.org/).
In general the pattern mostly looks like this:

```sh
type(scope?): subject  #scope is optional; multiple scopes are supported (current delimiter options: "/", "\" and ",")
```

Real world examples can look like this:

```
chore: run tests on travis ci
```

```
fix(server): send cors headers
```

```
feat(blog): add comment section
```

Common types according to [commitlint-config-conventional (based on the Angular convention)](https://github.com/conventional-changelog/commitlint/tree/master/@commitlint/config-conventional#type-enum) can be:

- build
- chore
- ci
- docs
- feat
- fix
- perf
- refactor
- revert
- style
- test

## Testing

Testing is an important aspect of maintaining the quality of the theme. When making changes, please ensure that:

- Existing tests are not broken.
- Write new tests to cover any new functionality or bug fixes.
- Test your changes thoroughly in different environments.
- Check for JavaScript errors and enable Debug.

During your tests, we encourage you to open your browser's Development Tools and keep the Console open, checking for any errors in the Console and the Network tabs.

To open the Console in Chrome or Firefox, you can press CMD+Alt+i in macOS or F12 in Windows. You can find out more [here](https://wordpress.org/support/article/using-your-browser-to-diagnose-javascript-errors/).

We would also recommend that you check your site's `debug.log` as you test.
To make sure errors are logged on your site, you can add the following to your site's `wp-config.php` file:

```php
define( 'WP_DEBUG', true );

if ( WP_DEBUG ) {

	@error_reporting( E_ALL );
	@ini_set( 'log_errors', true );
	@ini_set( 'log_errors_max_len', '0' );

	define( 'WP_DEBUG_LOG', true );
	define( 'WP_DEBUG_DISPLAY', false );
	define( 'CONCATENATE_SCRIPTS', false );
	define( 'SAVEQUERIES', true );

}
```
Your `wp-config.php` file may already include a line that says `define('WP_DEBUG', false);`. You can remove it, and replace it by the code above.

## Pull Requests

- **Add Documentation:** Be sure to update the `README.md` where applicable.

- **Add Tests:** Your patch will not be accepted if it does not have tests.

- **GPL Compatible:** All materials contributed must be compatible with GNU General Public License.

- **Semantic Release:** We **try** to follow [Semantic Versioning Specification](http://semver.org/).

- **Create Feature Branches:** Do not ask us to pull from master branch.

- **One Pull Request Per Feature:** If you want to do more than one thing, send multiple pull requests.

- **Send Coherent History:** Make sure each individual commit in your pull request is meaningful.

- **Squash Them:** If you had to make multiple intermediate commits while developing, [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

## Continuous Integration

We try to follow a **very basic** CI/CD pipeline workflow.

_In software engineering, CI/CD or CICD is the combined practice of continuous integration and continuous delivery or continuous deployment. CI/CD bridges the gaps between development and operation activities and teams by enforcing automation in the building, testing, and deployment of applications. [wikipedia](https://en.wikipedia.org/wiki/CI/CD)_

Continuous integration (CI)
_In software engineering, continuous integration is the practice of merging all developers' working copies to a shared mainline several times a day. [wikipedia](https://en.wikipedia.org/wiki/Continuous_integration)_

_Continuous integration (CI) is a software practice that requires frequently committing code to a shared repository. Committing code more often detects errors sooner and reduces the amount of code a developer needs to debug when finding the source of an error. - [GitHub](https://docs.github.com/en/actions/automating-builds-and-tests/about-continuous-integration)_

Stages:

- **Build:** Compiling and testing the code (Continuous Integration)

- **Package:** Producing an artifact from the code, ready to be deployed (Continuous Delivery)

- **Deploy:** Deploying the application to a server automatically (Continuous Deployment)

## Documentation

Good documentation is essential for users and other developers to understand the theme. If you make changes that require updating the documentation, please ensure to do so. This includes:

- Updating the README.md file with any relevant changes.
- Documenting any new features, options, or changes in behavior.
- Keeping the inline code comments up to date.

## Community Guidelines

When contributing to our project, please follow these guidelines to foster a positive and inclusive community:

- Be respectful and considerate towards other contributors.
- Provide constructive feedback and engage in healthy discussions.
- Help others and be willing to mentor new contributors.
- Follow the [Code of Conduct](CODE_OF_CONDUCT.md).

## Miscellaneous

**Available CLI commands:**

These are some of the CLI commands are available and tailored for WordPress theme development :


## Available CLI Composer Commands

1. **wpcore**
   - Command: `composer wpcore`
   - Description: Installs the WordPress core as a development dependency using the `johnpbloch/wordpress-core` Composer package.

2. **wpcs**
   - Command: `composer wpcs`
   - Description: Runs the PHP_CodeSniffer linter (PHPCS) to check code style in the `src` and `template-parts` directories.

3. **wpcs-all**
   - Command: `composer wpcs-all`
   - Description: Similar to `wpcs`, but includes additional directories for code style checking (`src` and `template-parts`).

4. **wpcs-lint**
   - Command: `composer wpcs-lint`
   - Description: Lints the code using PHPCS and prints out the issues found in the `src` and `template-parts` directories.
   - Checks all PHP files against [Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)

5. **wpcs-lint-all**
   - Command: `composer wpcs-lint-all`
   - Description: Similar to `wpcs-lint`, but includes additional directories for code style checking (`src` and `template-parts`).
   - Checks all PHP files against [Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)

6. **wpcs-fix**
   - Command: `composer wpcs-fix`
   - Description: Automatically fixes code style issues using PHP Code Beautifier and Fixer (PHP-CS-Fixer) for the `src` and `template-parts` directories.

7. **build**
   - Command: `composer build`
   - Description: Executes a series of tasks, including linting, dependency installation, and asset compilation. This is typically used for building the theme for production.

8. **test**
   - Command: `composer test`
   - Description: Runs PHPUnit tests, excluding integration tests.

9. **test-all**
   - Command: `composer test-all`
   - Description: Runs all PHPUnit tests, including integration tests.

10. **test-integration**
    - Command: `composer test-integration`
    - Description: Runs only the integration tests using PHPUnit.

11. **test-i**
    - Command: `composer test-i`
    - Description: Shortcut for running only the integration tests using PHPUnit.

12. **no-dev**
    - Command: `composer no-dev`
    - Description: Installs project dependencies without development packages.

13. **phpstan:lint**
    - Command: `composer phpstan:lint`
    - Description: Lints the code using PHPStan to identify potential issues.

14. **phpstan**
    - Command: `composer phpstan`
    - Description: Runs PHPStan to analyze the code for strict typing and other issues.

15. **psalm-install**
    - Command: `composer psalm-install`
    - Description: Installs Psalm static analysis tool as a development dependency.

16. **psalm-remove**
    - Command: `composer psalm-remove`
    - Description: Removes the Psalm static analysis tool from the development dependencies.

17. **psalm**
    - Command: `composer psalm`
    - Description: Runs Psalm static analysis to check for type-related issues in the code.

18. **psalm-secure**
    - Command: `composer psalm-secure`
    - Description: Runs Psalm with taint analysis to detect security-related issues.

19. **psalm-info**
    - Command: `composer psalm-info`
    - Description: Runs Psalm with the `--show-info=true` flag to provide additional information about issues.

20. **psalm-autofix**
    - Command: `composer psalm-autofix`
    - Description: Attempts to automatically fix certain Psalm issues in the code.

21. **setup-local-wp**
    - Command: `composer setup-local-wp`
    - Description: Sets up a local WordPress testing environment using the `bin/install-wp-tests.sh` script.

22. **setup-github-wp**
    - Command: `composer setup-github-wp`
    - Description: Sets up a GitHub Actions testing environment using the `bin/install-wp-tests.sh` script.

23. **lint**
    - Command: `composer lint`
    - Description: Executes a series of linting tasks, including code style checking, PHPStan, and Psalm analysis.

24. **codefix**
    - Command: `composer codefix`
    - Description: Runs PHP-CS-Fixer to automatically fix code style issues in the project.

25. **phpcs-fix**
    - Command: `composer phpcs-fix`
    - Description: Runs PHP-CS-Fixer to automatically fix code style issues in the project.

26. **php-cs-fixer**
    - Command: `composer php-cs-fixer`
    - Description: Installs the PHP-CS-Fixer tool, fixes code style issues, and removes it from the development dependencies.

These CLI Composer commands help streamline the development process for the Brisko theme by providing automated tools for code quality, testing, and environment setup. You can use these commands to maintain a consistent and efficient development workflow.


## Acknowledgments

We value and appreciate all contributions made to our WordPress theme. By contributing, you are helping to make the theme better for everyone. Thank you for your time and effort in making a positive impact!

## License

By contributing to Brisko, you agree that your contributions will be licensed under its GNU General Public License.
