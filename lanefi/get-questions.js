console.log("This is outside of getQuestions()");
//function getQuestions(){
    console.log("This is inside getQuestions()");
    var fs = require("fs");

    // var allContent = fs.readFileSync("./js/config.js", "utf-8", function(err, allContent){
    //     if(err){
    //         console.error(err);
    //         return;
    //     }
    // });
    // const path = require("path");
    // console.log(path);
    var allContent = fs.readFileSync("./js/config.js", "utf-8");
    //var configFile = require(path.join(__dirname, 'js', 'config'));
    
    var configFile = require("../../js/config.js");
    //const QUESTIONS = require("../../js/config");

    // var start = allContent.indexOf("{");
    // var end = allContent.lastIndexOf("};") + 2;


    // var questionsString = allContent.substring(start, end);
    //var questionsObj = QUESTIONS["MESH_NETWORK"];
    //var questionsString = JSON.stringify(QUESTIONS);

    //console.log(questionsString);
    //var questionsObj = JSON.parse(questionsString);

    // fs.writeFile("questions.php", questionsObj, function(err){
    //     if(err){
    //         console.error(err);
    //         return;
    //     }
    // });
//}
