class TitleText extends Phaser.GameObjects.DynamicBitmapText {
    constructor(scene, x, y, key, text, visible = false, size = 32) {
        super(scene, x, y, key, text, size);
        scene.add.existing(this);
        this.setOrigin(0.5);
        this.setVisible(visible);
    }

    addTween(scene, del, dur, xEnd, yEnd, e = 'Sine.easeOut') {
        scene.tweens.add({
            targets: this,
            delay: del,
            duration: dur,
            x: xEnd,
            y: yEnd,
            ease: e
        });
        return this;
    }
}

class TitleScreen extends Phaser.Scene {
    constructor() {
        super({ key: 'TitleScreen' });
        this.i = 0;
        this.delay = 0;
        this.rotateChar = 0;
        this.colors = [0xd52c2c, 0xdb2c65, 0xb65cb2, 0x9a6fc5, 0x6986d1, 0x4994cb, 0xffffff];
    }

    preload() {
        this.load.bitmapFont('gem', 'assets/gem.png', 'assets/gem.xml');
        this.load.image('TitleBackground', 'assets/TitleBackground.png');
        this.load.image('Board', 'assets/Board.png');
    }

    create() {
        this.cameras.main.setBackgroundColor('#333');
        this.physics.add.sprite(399, 300, 'TitleBackground');
        this.physics.add.sprite(399, 300, 'Board');

        this.title = new TitleText(this, 1100, 125, 'gem', 'Connect 4', true);
        this.txt1  = new TitleText(this, 399, 185, 'gem', 'Click on column to place chip');
        this.txt2  = new TitleText(this, 399, 235, 'gem', '2 player only');
        this.txt3  = new TitleText(this, 318, 285, 'gem', 'P1: Blue');
        this.txt4  = new TitleText(this, 399, 285, 'gem', '/');
        this.txt5  = new TitleText(this, 472, 285, 'gem', 'P2: Red');
        this.txt6  = new TitleText(this, 399, 300, 'gem', 'Press Space to Start', false, 80);

        this.title.setTintFill(this.colors[5], this.colors[5], this.colors[0], this.colors[0])
                  .addTween(this, 0, 3000, 399, 125, 'Bounce.easeOut')
                  .setScale(4);
        this.txt1.setTintFill(this.colors[5], this.colors[5], this.colors[6], this.colors[6])
                 .addTween(this, 1000, 2000, 399, 437);
        this.txt2.setTintFill(this.colors[6], this.colors[6], this.colors[0], this.colors[0])
                 .addTween(this, 1000, 2000, 399, 487);
        this.txt3.setTint(this.colors[5])
                 .addTween(this, 1000, 2000, 318, 537);
        this.txt4.addTween(this, 1000, 2000, 399, 537);
        this.txt5.setTint(this.colors[0])
                 .addTween(this, 1000, 2000, 472, 537);

        const x = this.rainbowCallback.bind(this);
        this.txt6.setDisplayCallback(x);
        this.time.delayedCall(1100, function() {
                this.txt1.setVisible(true);
                this.txt2.setVisible(true);
                this.txt3.setVisible(true);
                this.txt4.setVisible(true);
                this.txt5.setVisible(true);
        }, [], this);
        this.time.delayedCall(2200, function() {
                this.txt6.setVisible(true);
        }, [], this);

        this.input.keyboard.on('keydown-SPACE', function(pointer) {
            pointer.preventDefault();
            this.scene.start('PlayGame');
        }, this);
    }

    update (time, delta)
    {
        if (++this.delay == 4) {
            this.rotateChar = ++this.rotateChar % this.txt6.text.length;
            this.delay = 0;
        }
    }

    rainbowCallback(data)
    {
        const vars = data.parent.scene;
        const colors = vars.colors;
        if (vars.i < 3)
            data.color = colors[0];
        else if (vars.i < 6)
            data.color = colors[1];
        else if (vars.i < 9)
            data.color = colors[2];
        else if (vars.i < 12)
            data.color = colors[3];
        else if (vars.i < 15)
            data.color = colors[4];
        else
            data.color = colors[5];
        if (vars.i == vars.rotateChar)
            data.rotation = -Math.PI/48;
        if (++vars.i == 17)
            vars.i = 0;
        return data;
    }

}

class PlayGame extends Phaser.Scene {
    /* Overall variables:
        slotOffset  : Placement of chip in column
        slots       : Chip data at pos
        pos         : Position of chip
        yCoord      : Top-left placement of chip
        *Group      : Blue / Red chips
        p1Turn      : Keep track of player
        completeTurn: Lock game until chip has fallen into place
        index       : Used to determine 4 chips in a row
        token       : Which color chip to check for winner
        counter     : 4 in a row (same color chip) wins
    */
    static slotOffset = [...Array(7)];
    static slots = [...Array(42)];
    static pos;
    static yCoord;
    static blueGroup;
    static redGroup;
    static p1Turn;
    static completeTurn;
    static index;
    static token;
    static counter;
    static turn = document.getElementById('playerTurn');

    constructor() {
        super({ key: 'PlayGame' });
        this.columns = [];
        this.colColors = [0xa60f0f, 0xa6730f, 0xa69c0f, 0x49a60f, 0x0fa68f, 0x2d0fa6, 0xa60f9c];
    }

    newGame() {
        // fill board with empty name / fill slot offset with seven 5s
        PlayGame.slotOffset.fill(5);
        PlayGame.slots.fill({ name: "" });
        PlayGame.p1Turn = true;
        PlayGame.completeTurn = true;
    }

    preload() {
        this.load.image('board', 'assets/Board.png');
        this.load.image('blue', 'assets/BluePiece.png');
        this.load.image('red', 'assets/RedPiece.png');
        this.load.bitmapFont('gem', 'assets/gem.png', 'assets/gem.xml');
    }

    create() {
        this.newGame();
        // Background
        this.cameras.main.setBackgroundColor('#333');

        let slotSettings = { collideWorldBounds: true, velocityY: 500, maxSize: 21 };
        // Blue and Red chips
        PlayGame.blueGroup = this.physics.add.group(slotSettings);
        PlayGame.redGroup  = this.physics.add.group(slotSettings);

        // Board (black area)
        this.physics.add.sprite(399, 300, 'board');

        // Collide chips
        this.physics.add.collider(PlayGame.blueGroup, PlayGame.redGroup);
        this.physics.add.collider(PlayGame.blueGroup, PlayGame.blueGroup);
        this.physics.add.collider(PlayGame.redGroup, PlayGame.redGroup);

        // Set up each chip column
        for(let i = 0, tlx = 0; i < 7; ++i, tlx += 114) {
            this.columns[i] = this.add
                                  .rectangle(tlx, 0, 112, 600)
                                  .setName(i.toString())
                                  .setOrigin(0, 0)
                                  .setStrokeStyle(2, this.colColors[i])
                                  .setInteractive();
            this.columns[i].on('pointerup', this.dropChip);
        }

        PlayGame.turn.style.visibility = "visible";
        this.playerHUD();
    }

    playerHUD(pNum = 1, bdrColor = "#4994cb", bkgndColor = "rgb(105 134 209 / 0.6)") {
        PlayGame.turn.innerHTML = "Turn: Player " + pNum;
        PlayGame.turn.style.borderColor = bdrColor;
        PlayGame.turn.style.backgroundColor = bkgndColor;
    }

    update() {
        if (!PlayGame.completeTurn) {
            // Current falling chip
            if (PlayGame.slots[PlayGame.pos].body.velocity.y <= 0) {
                // End at body.y coordinate and keep it stationary, resume game
                PlayGame.slots[PlayGame.pos].body.y = PlayGame.yCoord;
                PlayGame.slots[PlayGame.pos].setImmovable(true);

                if (this.checkForWinner()) {
                    this.scene.pause();
                    this.scene.launch('EndGame');
                }

                game.input.enabled = true;
                PlayGame.completeTurn = true;
                if (PlayGame.p1Turn)
                    this.playerHUD();
                else
                    this.playerHUD(2, "#d52c2c", "rgb(219 44 101 / 0.6");
            }
        }
    }

    dropChip() {
        // slotNum = 0 - 6
        let chipColor = PlayGame.p1Turn ? 'blue' : 'red';
        let slotNum = parseInt(this.name);

        // Last time column slot may be filled
        if (PlayGame.slotOffset[slotNum] === 0)
            this.off('pointerup');

        // Ending top-right y coordinate, pos 0 - 41 (L to R, T to B), decrement num of remaining chips allowed
        PlayGame.yCoord = PlayGame.slotOffset[slotNum] * 100 + 2;
        PlayGame.pos = PlayGame.slotOffset[slotNum] * 7 + slotNum;
        PlayGame.slotOffset[slotNum]--;

        // Make chip and set it behind board
        PlayGame.slots[PlayGame.pos] = PlayGame.p1Turn ?
            PlayGame.blueGroup.create(57 + parseInt(this.name) * 114, 50, chipColor) :
            PlayGame.redGroup.create(57 + parseInt(this.name) * 114, 50, chipColor)  ;
        PlayGame.slots[PlayGame.pos].setDepth(-1).setName(chipColor);

        // Wait for chip to go into slot and freeze input until chip has completed falling
        PlayGame.p1Turn = PlayGame.p1Turn ? false : true;
        PlayGame.completeTurn = false;
        game.input.enabled = false;
    }

    checkForWinner() {
        PlayGame.token = PlayGame.p1Turn ? 'red' : 'blue';
        // Vertical / Horizontal / Diagonal \ then /
        for (let i = 0; i <= 35; i += 7) {
            for (let j = 0; j < 7; j++) {
                PlayGame.index = i + j;
                if (i <= 14 && this.checkSlots(7))
                    return true;
                if (j < 4 && this.checkSlots(1))
                    return true;
                if ((i <= 14 && j < 4) && this.checkSlots(8))
                    return true;
                if ((i >= 21 && j < 4) && this.checkSlots(-6))
                    return true;
            }
        }
        return false;
    }

    checkSlots(offset, counter = 4) {
        while (counter--) {
            if(PlayGame.slots[PlayGame.index + offset * counter].name !== PlayGame.token)
                return false;
        }
        this.endGame(offset);
        return true;
    }

    endGame(offset, counter = 4) {
        while (counter--)
            PlayGame.slots[PlayGame.index + offset * counter].name = '';
        this.darken();
    }

    darken() {
        for(let i = 0; i < 42; ++i)
            if (PlayGame.slots[i].name !== '')
                PlayGame.slots[i].tint = '0x555555';
    }
}

class EndGame extends Phaser.Scene {
    constructor() {
        super({ key: 'EndGame' });
    }

    preload() {
        this.load.image('blue', 'assets/BluePiece.png');
        this.load.image('red', 'assets/RedPiece.png');
        this.load.bitmapFont('gem', 'assets/gem.png', 'assets/gem.xml');
    }

    create() {
        game.input.enabled = true;

        this.txtEnd = new TitleText(this, 399, 0, 'gem', 'Winner: ' + PlayGame.token, true);
        this.txtEnd.setTint("0xffffff")
                   .addTween(this, 0, 3000, 399, 125, 'Bounce.easeOut')
                   .setScale(3);

        this.playAgainBall = this.physics.add.image(399, 300, PlayGame.token)
                                             .setScale(2).setTint("0xffffff")
                                             .setInteractive();
        this.playAgainBall.on('pointerup', this.restartGame.bind(this));

        this.playAgain = new TitleText(this, 399, 300, 'gem', 'Play\nAgain?\nClick Here', true);
        this.playAgain.on('pointerup', this.restartGame.bind(this));

    }

    restartGame() {
        this.scene.start('PlayGame');
    }
}

const config = {
    type: Phaser.AUTO,
    parent: 'game',
    scale: {
        mode: Phaser.Scale.FIT,
        parent: 'game',
        autoCenter: Phaser.Scale.CENTER_BOTH,
        width: 798,
        height: 600
    },
    scene: [TitleScreen, PlayGame, EndGame],
    transparent: true,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: false
        }
    }
};
const game = new Phaser.Game(config);
