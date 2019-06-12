// sets mode webpack runs under
const NODE_ENV = process.env.NODE_ENV || 'development';

module.exports = {
	mode: NODE_ENV,
	
	// entry is the source script
	entry: {
		//yt: './src/youtube-block.js',
		hero-tagline: 'blocks/src/tagline.js'
	},
	
	//output is where to write the built file
	output: {
		path: __dirname + "/blocks/build/", 
		filename: '[name].build.js', 
	},
	module: {
		// the list of rules used to process files
		// this looks for .js file, exclude files
		// in node_modules directory, and uses the babel-loader to process
		rules: [
			{
				test: /.js$/,
				exclude: /node_modules/,
				loader: 'babel-loader',
			},
		],
	},
};