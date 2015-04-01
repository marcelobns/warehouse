/**
 * Created by Marcelo on 24/10/14.
 */
module.exports = function(grunt) {
    grunt.initConfig({
        less: {
            'webroot/css/build.css': ['webroot/css/src/application.less']
        },
        uglify: {
            build: {
                src: 'webroot/js/custom.js',
                dest: 'webroot/js/build.js'
            }
        },
        watch: {
            less: {
                files: 'webroot/css/src/*.less',
                tasks: 'less'
            },
            // uglify: {
            //     files: 'webroot/js/src/*.js',
            //     tasks: 'uglify'
            // }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');

    grunt.registerTask('default', ['watch']);
};
