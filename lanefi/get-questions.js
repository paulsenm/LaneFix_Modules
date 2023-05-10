    var fs = require("fs");
    //var allContent = fs.readFileSync("./js/config.js", "utf-8");

    var functionsFile = require("../../js/functions.js");
    for (const functionName in functionsFile.exportFunctions){
        //console.log(`Key was:  ${k}, vaule was: ${v}`);
        global[functionName] = functionsFile.exportFunctions[functionName];
    }

    //timeString = functionsFile.exportFunctions.timeString;
    console.log(timeString());
    var questionsFile = require("../../js/config.js");
    //var timeString = require("../../js/functions.js");
    //import { timeString } from "../../js/functions.js";
    // import * as functions from "../../js/functions.js";
    // import QUESTIONS from "../../js/config.js";
    //var configFile = require("../../js/config.js");

