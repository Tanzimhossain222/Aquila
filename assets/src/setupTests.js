// src/js/setupTests.js
jest.mock('wp', () => ({
    blocks: {
      registerBlockType: jest.fn(),
      // Add other properties and methods as needed
    },
  }));
  