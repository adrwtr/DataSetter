module.exports = function(grunt) {

    'use strict';

    // configuração do projeto
    var gruntConfig = {
        pkg: grunt.file.readJSON('package.json'),

        watch : {
            dist : {
                files : [
                    '../module/Database/src/**',               
                    '../module/Database/test/DatabaseTest/Controller/**',               
                    '../module/Database/test/DatabaseTest/File/**',               
                    '../module/Database/test/DatabaseTest/Parser/**',               
                    '../module/Database/test/DatabaseTest/Parser/Elementos/**',               
                ],

                tasks : [ 'shell:multiple' ]
            }
        }, // watch

        
        shell: {
            multiple: {
                command: [
                    'cd C:\\Apache24\\htdocs\\data\\module\\Database\\test',
                    '..\\..\\..\\vendor\\bin\\phpunit > teste.txt',                    
                    '..\\..\\..\\vendor\\bin\\phpcs ../src/ --encoding=UTF-8 --report=full --report-width=75 --tab-width=4 --standard=./phpcs_ruleset.xml >> teste.txt',
                    '..\\..\\..\\vendor\\bin\\phpcpd ..\\src\\ >> teste.txt',
                    '..\\..\\..\\vendor\\bin\\phpmd  ..\\src\\ text codesize,unusedcode,naming >> teste.txt',
                    '..\\..\\..\\vendor\\bin\\pdepend --overview-pyramid=./pdepend --jdepend-chart=./jdepend.svg ../src/',                       
                    '..\\..\\..\\vendor\\bin\\phpunit --coverage-html ./code_report'
                ].join('&&')
            }
        } // watch
    

    };

    grunt.initConfig(gruntConfig);

    // carregando plugins       
    grunt.loadNpmTasks( 'grunt-contrib-watch' );
    grunt.loadNpmTasks( 'grunt-shell' );
    

    // tarefas
    grunt.registerTask( 
        'default', 
        [ 'shell:multiple' ] 
    );

    // Tarefa para Watch
    grunt.registerTask( 'w', [ 'watch' ] );
};