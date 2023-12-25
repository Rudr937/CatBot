function meow(){
    let speakData = new SpeechSynthesisUtterance();
    speakData.volume = 1;
    speakData.rate = 1;
    speakData.pitch = 2;
    speakData.text = "textToSpeak";
    speakData.lang = 'hi';
    speakData.voice = getVoices()[0];
}
function getAllVoices() {
    let voices = speechSynthesis.getVoices();
    let voiceMenu = document.getElementById("voiceVoiceMenu");
    if(voiceMenu.options.length==0){
        for (voice in voices){
            let newOption = document.createElement("option");
            newOption.text = voices[voice].name.split("-")[0];
            voiceMenu.add(newOption);
        }
    }
}
var startVoiceBot = () =>{
    let voiceBot = new SpeechSynthesisUtterance();
    voiceBot.volume = 1;
    voiceBot.rate = 1;
    voiceBot.pitch = 2;
    voiceBot.lang = 'en';
    voiceBot.text = "Cat Voice Bot Is Started!";
    speechSynthesis.speak(voiceBot);
    return voiceBot;
}
var stopVoiceBot = () =>{

}
var startStop = (btnId) =>{
    let startStopBtn = document.getElementById(btnId);
    if(startStopBtn.innerHTML=="Start"){
        startVoiceBot();
        startStopBtn.innerHTML = "Stop";
    }
    else{
        startStopBtn.innerHTML = "Start";
    }
}
var saveSettings = (btnId, voiceLang) =>{

}
if (typeof speechSynthesis.onvoiceschanged !== undefined) {
    speechSynthesis.onvoiceschanged = getAllVoices;
}
