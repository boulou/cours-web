var game;
var soundManager;
function start(){
	
	soundManager = new SoundManager();
	soundManager.url = "/cours-web/";
	soundManager.setup({url:'/cours-web/'});
	
	soundManager.onready(function(){
		game = new Game();
	});
	
	soundManager.beginDelayedInit();
}