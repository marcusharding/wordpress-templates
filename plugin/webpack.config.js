const path = require('path');
const distThemeFolder = 'boilerplate-site-plugin';

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require("copy-webpack-plugin");
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    context: __dirname,
    entry: ['./src/scripts/index.js'],
    output: {
        path: path.resolve(__dirname, 'dist/' + distThemeFolder + '/')
    },
    mode: 'development',
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.(scss|sass)$/i,
                use: [
                    'css-loader',
                    'sass-loader'
                ]
            }
        ]
    },
    optimization: {
        minimize: true,
        minimizer: [
          new CssMinimizerPlugin(),
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'styles/[name].min.css'
        }),
        new CopyPlugin({
            patterns: [
                { from: path.resolve(__dirname, 'src/*.php'), to: '[name].[ext]' },
            ]
        })
    ]
};