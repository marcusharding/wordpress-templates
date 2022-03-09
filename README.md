# Wordpress Templates

Custom wordpress templates to make it easier and quicker to spin up a new theme / plugin for use in other projects

## Making it your own theme / plugin

- Update "distThemeFolder" variable name in webpack.config.js
- Update "name", "description" in package.json
- Update "Theme Name", "Theme URI", "Description" in site/style.css
- Replace "boilterplate" text in all functions with your own site name (Can be found in functions.php and called in header.php etc)
- Update classnames in php templates to your own naming convention

## Installation

Use the package manager yarn [yarn](https://yarnpkg.com/) to install project dependencies.

```bash
yarn install
```

## Usage

```python

# Builds for development and watches for changes
yarn run dev

# Runs test scripts for the project
yarn run test

# Builds files for production
yarn run build
```

## License
[MARCUSJHDEV](https://marcusjh.co.uk)