const withPlugins = require('next-compose-plugins');
const withImages = require('next-images');

module.exports = withPlugins([withImages], {
  webpack(config, options) {
    config.module.rules.push({
      test: /\.(ogg|mp3|wav|mpe?g)$/i,
      loader: 'file-loader',
      options: {
        name: '[name].[ext]',
        outputPath: 'static/audio',
        publicPath: '_next/static/audio',
      },
    });

    return config;
  },
});
