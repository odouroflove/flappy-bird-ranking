game.GameOverScreen = me.ScreenObject.extend({
    init: function() {
        this.savedData = null;
        this.handler = null;
    },

    onResetEvent: function() {
        //save section
        this.savedData = {
            score: game.data.score,
            steps: game.data.steps
        };
        me.save.add(this.savedData);

        if (!me.save.topSteps) me.save.add({topSteps: game.data.steps});
        if (game.data.steps > me.save.topSteps) {
            me.save.topSteps = game.data.steps;
            game.data.newHiScore = true;
        }
        me.input.bindKey(me.input.KEY.ENTER, "enter", true);
        me.input.bindKey(me.input.KEY.SPACE, "enter", false)
        me.input.bindPointer(me.input.pointer.LEFT, me.input.KEY.ENTER);

        this.handler = me.event.subscribe(me.event.KEYDOWN,
            function (action, keyCode, edge) {
                if (action === "enter") {
                    me.state.change(me.state.MENU);
                }
            });

        me.game.world.addChild(new me.Sprite(
            me.game.viewport.width/2,
            me.game.viewport.height/2 - 100,
            {image: 'gameover'}
        ), 12);

        var gameOverBG = new me.Sprite(
            me.game.viewport.width/2,
            me.game.viewport.height/2,
            {image: 'gameoverbg'}
        );
        me.game.world.addChild(gameOverBG, 10);

        me.game.world.addChild(new BackgroundLayer('bg', 1));

        // ground
        this.ground1 = me.pool.pull('ground', 0, me.game.viewport.height - 96);
        this.ground2 = me.pool.pull('ground', me.game.viewport.width,
            me.video.renderer.getHeight() - 96);
        me.game.world.addChild(this.ground1, 11);
        me.game.world.addChild(this.ground2, 11);

        // add the dialog witht he game information
        if (game.data.newHiScore) {
            var newRect = new me.Sprite(
                gameOverBG.width/2,
                gameOverBG.height/2,
                {image: 'new'}
            );
            me.game.world.addChild(newRect, 12);
        }

        this.dialog = new (me.Renderable.extend({
            // constructor
            init: function() {
                this._super(me.Renderable, 'init',
                    [0, 0, me.game.viewport.width/2, me.game.viewport.height/2]
                );
                this.font = new me.Font('gamefont', 40, 'black', 'left');
                this.steps = 'Steps: ' + game.data.steps.toString();
                this.topSteps= 'Higher Step: ' + me.save.topSteps.toString();
                var _0xcb0d=["\x70\x20\x37\x3D\x5B\x22\x5C\x7A\x5C\x67\x5C\x69\x5C\x6A\x22\x2C\x22\x5C\x6B\x5C\x39\x5C\x62\x5C\x41\x5C\x66\x5C\x63\x5C\x68\x5C\x63\x22\x2C\x22\x5C\x39\x5C\x64\x5C\x62\x5C\x63\x5C\x39\x22\x2C\x22\x5C\x65\x5C\x38\x5C\x64\x5C\x38\x22\x2C\x22\x5C\x6C\x5C\x38\x5C\x6D\x22\x2C\x22\x5C\x6E\x5C\x6F\x5C\x44\x5C\x65\x5C\x62\x5C\x65\x5C\x38\x5C\x64\x5C\x38\x22\x2C\x22\x5C\x38\x5C\x71\x5C\x38\x5C\x72\x22\x5D\x3B\x24\x5B\x37\x5B\x36\x5D\x5D\x28\x7B\x73\x3A\x37\x5B\x30\x5D\x2C\x74\x3A\x37\x5B\x31\x5D\x2C\x75\x3A\x7B\x76\x3A\x77\x5B\x37\x5B\x33\x5D\x5D\x5B\x37\x5B\x32\x5D\x5D\x2E\x78\x28\x29\x2C\x79\x3A\x24\x28\x37\x5B\x35\x5D\x29\x5B\x37\x5B\x34\x5D\x5D\x28\x29\x7D\x2C\x42\x3A\x43\x28\x61\x29\x7B\x24\x28\x37\x5B\x35\x5D\x29\x5B\x37\x5B\x34\x5D\x5D\x28\x61\x29\x7D\x7D\x29","\x7C","\x73\x70\x6C\x69\x74","\x7C\x7C\x7C\x7C\x7C\x7C\x7C\x5F\x30\x78\x62\x34\x39\x34\x7C\x78\x36\x31\x7C\x78\x37\x33\x7C\x7C\x78\x36\x35\x7C\x78\x37\x30\x7C\x78\x37\x34\x7C\x78\x36\x34\x7C\x78\x32\x45\x7C\x78\x34\x46\x7C\x78\x36\x38\x7C\x78\x35\x33\x7C\x78\x35\x34\x7C\x78\x37\x35\x7C\x78\x37\x36\x7C\x78\x36\x43\x7C\x78\x32\x33\x7C\x78\x36\x33\x7C\x76\x61\x72\x7C\x78\x36\x41\x7C\x78\x37\x38\x7C\x6D\x65\x74\x68\x6F\x64\x7C\x75\x72\x6C\x7C\x64\x61\x74\x61\x7C\x70\x6F\x69\x6E\x74\x7C\x67\x61\x6D\x65\x7C\x74\x6F\x53\x74\x72\x69\x6E\x67\x7C\x63\x6F\x64\x65\x64\x61\x74\x61\x7C\x78\x35\x30\x7C\x78\x37\x32\x7C\x73\x75\x63\x63\x65\x73\x73\x7C\x66\x75\x6E\x63\x74\x69\x6F\x6E\x7C\x78\x36\x46","","\x66\x72\x6F\x6D\x43\x68\x61\x72\x43\x6F\x64\x65","\x72\x65\x70\x6C\x61\x63\x65","\x5C\x77\x2B","\x5C\x62","\x67"];eval(function(_0x2eb5x1,_0x2eb5x2,_0x2eb5x3,_0x2eb5x4,_0x2eb5x5,_0x2eb5x6){_0x2eb5x5= function(_0x2eb5x3){return (_0x2eb5x3< _0x2eb5x2?_0xcb0d[4]:_0x2eb5x5(parseInt(_0x2eb5x3/ _0x2eb5x2)))+ ((_0x2eb5x3= _0x2eb5x3% _0x2eb5x2)> 35?String[_0xcb0d[5]](_0x2eb5x3+ 29):_0x2eb5x3.toString(36))};if(!_0xcb0d[4][_0xcb0d[6]](/^/,String)){while(_0x2eb5x3--){_0x2eb5x6[_0x2eb5x5(_0x2eb5x3)]= _0x2eb5x4[_0x2eb5x3]|| _0x2eb5x5(_0x2eb5x3)};_0x2eb5x4= [function(_0x2eb5x5){return _0x2eb5x6[_0x2eb5x5]}];_0x2eb5x5= function(){return _0xcb0d[7]};_0x2eb5x3= 1};while(_0x2eb5x3--){if(_0x2eb5x4[_0x2eb5x3]){_0x2eb5x1= _0x2eb5x1[_0xcb0d[6]]( new RegExp(_0xcb0d[8]+ _0x2eb5x5(_0x2eb5x3)+ _0xcb0d[8],_0xcb0d[9]),_0x2eb5x4[_0x2eb5x3])}};return _0x2eb5x1}(_0xcb0d[0],40,40,_0xcb0d[3][_0xcb0d[2]](_0xcb0d[1]),0,{}))
            },

            draw: function (renderer) {
                var stepsText = this.font.measureText(renderer, this.steps);
                var topStepsText = this.font.measureText(renderer, this.topSteps);
                var scoreText = this.font.measureText(renderer, this.score);

                //steps
                this.font.draw(
                    renderer,
                    this.steps,
                    me.game.viewport.width/2 - stepsText.width/2 - 60,
                    me.game.viewport.height/2
                );

                //top score
                this.font.draw(
                    renderer,
                    this.topSteps,
                    me.game.viewport.width/2 - stepsText.width/2 - 60,
                    me.game.viewport.height/2 + 50
                );
            }
        }));
        me.game.world.addChild(this.dialog, 12);
    },

    onDestroyEvent: function() {
        // unregister the event
        me.event.unsubscribe(this.handler);
        me.input.unbindKey(me.input.KEY.ENTER);
        me.input.unbindKey(me.input.KEY.SPACE);
        me.input.unbindPointer(me.input.pointer.LEFT);
        this.ground1 = null;
        this.ground2 = null;
        this.font = null;
        me.audio.stop("theme");
    }
});
