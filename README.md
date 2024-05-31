# WP-theme-env

A WordPress developer environment for theme development.

## Requirements
- **PNPM**: A fast, disk space efficient package manager.
- **wp-env**: A tool for running WordPress environments for development and testing.
- **Docker**: A platform for developing, shipping, and running applications inside containers.

## Installation
To set up the development environment, execute the following command:
```bash
pnpm install
```

## Development
To start the development server, execute:
```bash
pnpm dev
```

- Access the development site at [http://localhost:8888](http://localhost:8888).
- Access the production-ready site at [http://localhost:8889](http://localhost:8889).

## Versioning
Versioning is fully automated using the [semantic-release](https://github.com/semantic-release/semantic-release) package. This tool ensures that version numbers are updated based on the commit messages, following semantic versioning rules.

To build assets and increment the version number, execute:
```bash
pnpm release
```

To ensure correct versioning, adhere to the [semantic versioning rules](https://semver.org/):

> Given a version number MAJOR.MINOR.PATCH, increment the:
>
> 1. **MAJOR** version for incompatible API changes.
> 2. **MINOR** version for adding functionality in a backward-compatible manner.
> 3. **PATCH** version for backward-compatible bug fixes.
>
> Additional labels for pre-release and build metadata are available as extensions to the MAJOR.MINOR.PATCH format.

Commits must follow the conventional commit structure:
```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

### Examples
#### Breaking Release
For major changes that are not backward-compatible, include the `BREAKING CHANGE:` token in the footer:
```
feat: allow provided config object to extend other configs

BREAKING CHANGE: `extends` key in config file is now used for extending other config files
```

#### Feature Release
For new features that are backward-compatible:
```
feat: send an email to the customer when a product is shipped
```

#### Fix Release
For backward-compatible bug fixes:
```
fix: prevent racing of requests

Introduce a request id and a reference to the latest request. Dismiss
incoming responses other than from the latest request.
```

For further details, refer to the [semantic-release documentation](https://github.com/semantic-release/semantic-release) to explore all available options or to integrate version bumping into a continuous integration (CI) workflow.