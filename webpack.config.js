const {
    newWebpackConfigBuilder,
    SourceType
} = require('@goldeimer/webpack-config')

const builder = newWebpackConfigBuilder(__dirname)

builder.loadSource(SourceType.FONT)
builder.loadSource(SourceType.JAVASCRIPT)
builder.loadSource(SourceType.STYLESHEET)

builder.setOutputPath('static')
builder.setPublicPath('/wp-content/themes/[name]/static/')

module.exports = (...args) => builder.build(...args)
