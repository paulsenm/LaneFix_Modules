    //require node's fs to write to a file
    var fs = require("fs");

    //get the functions from functions.js
    var functionsFile = require("../../js/functions.js");
    for (const functionName in functionsFile.exportFunctions){
        console.log(functionName);
        global[functionName] = functionsFile.exportFunctions[functionName];
    }

    //get the questions object and stringify it
    //const QUESTIONS = require("../../js/config.js");
    //const questionsString = JSON.stringify(QUESTIONS);

    //write the json string to cache.autoQuestions.json:
    // fs.writeFile("cache.autoQuestions.json", questionsString, function(err){
    //     if(err){
    //         console.log(err);
    //         return;
    //     }
    // });

