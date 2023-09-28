# WordPress Theme: Aquila 🎨💥

Aquila is a versatile WordPress theme that offers a wide range of features to enhance your website. Whether you're creating a personal blog, an e-commerce site, or a portfolio, Aquila has you covered.

## Features

Aquila comes with an extensive set of features to make your website development seamless. These features are organized into sections:

### Custom Content Types

- [x] Custom Post Type
- [x] Custom Taxonomy
- [x] Custom Widget
- [x] Custom Shortcode
- [x] Custom Meta Box

### Custom Templates

- [x] Custom Template
- [x] Custom Menu
- [x] Custom Page Template
- [x] Custom Post Type Archive Template
- [x] Custom Taxonomy Archive Template

### Gutenberg Blocks

- [x] Gutenberg Block
- [x] Gutenberg Block Category
- [x] Gutenberg Block Pattern
- [x] Gutenberg Block Style
- [x] Gutenberg Block Template

### Advanced Features

- [x] Pagination
- [x] Custom Infinite Scroll 
- [x] Custom Search Form
- [x] Register Block Pattern
- [x] Custom Block Category
- [x] Archive Template

## Dependencies

Aquila is built on top of these powerful tools and libraries:

- [Bootstrap 5](https://getbootstrap.com/)
- [Slick Slider](https://kenwheeler.github.io/slick/)
- SAAS
- Webpack
- Babel
- Eslint
- Stylelint
- Ajax

## Installation with Yarn

To get started with Aquila using Yarn, follow these steps:

1. Clone the GitHub repository:

   ```bash
   git clone https://github.com/code-BitLabs/Aquila
   ```

2. Navigate to the 'assets' directory:

   ```bash
   cd Aquila/assets
   ```

3. Install the necessary dependencies using Yarn:

   ```bash
   yarn install
   ```

## Development

During the development phase, you can use the following command to start a development server:

```bash
yarn dev
```

Before pushing your code for development or contribution, make sure to run the precommit checks from the assets directory:

```bash
cd assets && yarn precommit
```

## Production

For production-ready builds, use the following command:

```bash
yarn prod
```

## Linting & Formatting

To ensure code quality, Aquila provides linting and formatting tools. Use the following commands:

- To fix most errors and show any remaining ones that cannot be fixed automatically:

  ```bash
  yarn lint:fix
  ```

- To lint and fix styles following the stylelint configuration used in WordPress Gutenberg:

  ```bash
  yarn stylelint:fix
  ```

- Formatting code with prettier (TO BE ADDED):

  ```bash
  yarn format-js
  ```

Enjoy developing your WordPress website with Aquila using Yarn! If you have any questions or need assistance, please don't hesitate to reach out.
