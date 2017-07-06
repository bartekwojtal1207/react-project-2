module.exports = {
  context: __dirname + '/js',

  entry: [
    // Set up an ES6-ish environment
    'babel-polyfill',
    // Add your application's scripts below
    './create_table.jsx',
  ],

  output: {
    filename: 'create_table.js',
    path: __dirname + '/dist',
  },

  module: {
    loaders: [
      {
        loader: 'babel-loader',

        // Exclude /node_modules directory
        exclude: /node_modules/,

        // Only run `.js` and `.jsx` files through Babel
        test: /\.js$/,

        // Options to configure babel with
        query: {
          plugins: ['transform-runtime'],
          presets: ['es2015', 'react']
        }
      },
    ]
  }
}
