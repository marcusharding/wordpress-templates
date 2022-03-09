const path = require('path');
const distThemeFolder = 'boilerplate-site-theme';

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require("copy-webpack-plugin");
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    context: __dirname,
    entry: [ './site/scripts/index.js', './site/styles/index.sass' ],
    output: {
        path: path.resolve(__dirname, 'dist/' + distThemeFolder + '/'),
        filename: 'scripts/[name].js'
    },
    mode: 'development',
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                enforce: 'pre',
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'eslint-loader'
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                use: {
                    loader: 'file-loader',
                    options: {
                        name: 'fonts/[name].[hash].[ext]'
                    }
                }
            },
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
                { from: path.resolve(__dirname, 'site/*.css'), to: '[name].[ext]' },
                { from: path.resolve(__dirname, 'site/*.php'), to: '[name].[ext]' },
                { from: path.resolve(__dirname, 'site/*.png'), to: '[name].[ext]' }
            ]
        })
    ]
};