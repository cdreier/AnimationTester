ig.module( 
	'game.main' 
)
.requires(
	'impact.game',
	
	'game.entities.AnimationTest'
)
.defines(function(){

MyGame = ig.Game.extend({
	
	gravity: 0,
	
	
	init: function() {
		this.spawnEntity(EntityAnimationTest, ig.system.width/2-rawWidth/2, ig.system.height/2-rawHeight/2, {img : img});
		this.clearColor = bg;
	},
	
	apply: function(){
				
		rawWidth = $("#w").val();
		rawHeight = $("#h").val();
		animationFrames = $("#anim").val();
		animationSpeed = $("#animSpeed").val();
		zoom = $("#z").val();
		img = $("#sprite").val();
		bg = $("#bg").val();
		
		width = rawWidth*3;
		height = rawHeight*3;
		strippedBg = bg.split("#");
		
		$("#code").html("this.addAnim( 'name', "+animationSpeed+", ["+animationFrames+"] );\n\n\nnew ig.AnimationSheet( 'media/"+img+", "+rawWidth+", "+rawHeight+" );");
		$("#perm").html("http://"+host+"?s="+img+
				"&w="+rawWidth+"&h="+rawHeight+
				"&z="+zoom+"&a="+animationFrames+
				"&sp="+animationSpeed+
				"&bg="+strippedBg[1]
			);
		
		ig.system.resize( width, height, zoom );
		this.clearColor = bg;
		e = ig.game.getEntitiesByType(EntityAnimationTest)[0];
		e.kill();
		this.spawnEntity(EntityAnimationTest, ig.system.width/2-rawWidth/2, ig.system.height/2-rawHeight/2, {img : img});
	}
	
	
});


ig.main( '#canvas', MyGame, 60, width, height, 2 );

});
