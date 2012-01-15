ig.module(
	'game.entities.AnimationTest'
)
.requires(
	'impact.entity'
)
.defines(function(){

EntityAnimationTest = ig.Entity.extend({

        
    init: function( x, y, settings ) {
        
        this.parent( x, y, settings );
        ig.merge(this, settings);
        
        this.animSheet = new ig.AnimationSheet( "media/"+settings.img, rawWidth, rawHeight );
        
        tFrames = animationFrames.split(",");
        frames = new Array();
        for(f in tFrames){
        	frames[f] = parseInt(tFrames[f]) ;
        }
        
        this.addAnim( 'idle', animationSpeed, frames );
		
    }
    

});





});

   
