const WHITE   = [255, 255, 255, 255];
const COLOR_RED     = [255, 0, 0, 255];
const COLOR_GREEN   = [0, 255, 0, 255];
const COLOR_BLUE    = [0, 0, 255, 255];
const BLACK   = [0, 0, 0, 255];

const A = {
    pitch: 5,
    buffer: [
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, BLACK, BLACK, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const B = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, BLACK, BLACK, WHITE,
    ]
};
const C = {
    pitch: 5,
    buffer: [
        WHITE, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, BLACK, BLACK, WHITE,
    ]
};
const D = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, BLACK, BLACK, WHITE,
    ]
};
const E = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, BLACK,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, BLACK, BLACK, BLACK, BLACK,
    ]
};
const F = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, BLACK,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
    ]
};
const G = {
    pitch: 5,
    buffer: [
        WHITE, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, BLACK, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, BLACK, BLACK, WHITE,
    ]
};
const H = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, BLACK, BLACK, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const I = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, BLACK,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        BLACK, BLACK, BLACK, BLACK, BLACK,
    ]
};
const J = {
    pitch: 5,
    buffer: [
        WHITE, WHITE, WHITE, WHITE, BLACK,
        WHITE, WHITE, WHITE, WHITE, BLACK,
        WHITE, WHITE, WHITE, WHITE, BLACK,
        WHITE, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, BLACK, BLACK, WHITE,
    ]
};
const K = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, BLACK, WHITE,
        BLACK, WHITE, BLACK, WHITE, WHITE,
        BLACK, BLACK, WHITE, WHITE, WHITE,
        BLACK, WHITE, BLACK, WHITE, WHITE,
        BLACK, WHITE, WHITE, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const L = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, BLACK, BLACK, BLACK, BLACK,
    ]
};
const M = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, WHITE, BLACK, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const N = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, WHITE, WHITE, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        BLACK, WHITE, WHITE, BLACK, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const O = {
    pitch: 5,
    buffer: [
        WHITE, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, BLACK, BLACK, WHITE,
    ]
};
const P = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
    ]
};
const Q = {
    pitch: 5,
    buffer: [
        WHITE, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        WHITE, BLACK, BLACK, BLACK, WHITE,
        WHITE, WHITE, WHITE, WHITE, BLACK,
    ]
};
const R = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, BLACK, WHITE, WHITE,
        BLACK, WHITE, WHITE, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const S = {
    pitch: 5,
    buffer: [
        WHITE, BLACK, BLACK, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        WHITE, BLACK, BLACK, BLACK, WHITE,
        WHITE, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, BLACK, BLACK, WHITE,
    ]
};
const T = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, BLACK,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
    ]
};
const U = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, BLACK, BLACK, WHITE,
    ]
};
const V = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
    ]
};
const W = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        BLACK, WHITE, BLACK, WHITE, BLACK,
        BLACK, BLACK, WHITE, BLACK, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const X = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        BLACK, WHITE, WHITE, WHITE, BLACK,
    ]
};
const Y = {
    pitch: 5,
    buffer: [
        BLACK, WHITE, WHITE, WHITE, BLACK,
        BLACK, WHITE, WHITE, WHITE, BLACK,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE, BLACK, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
    ]
};
const Z = {
    pitch: 5,
    buffer: [
        BLACK, BLACK, BLACK, BLACK, BLACK,
        WHITE, WHITE, WHITE, WHITE, BLACK,
        WHITE, WHITE, WHITE, BLACK, WHITE,
        WHITE, WHITE, BLACK, WHITE, WHITE,
        WHITE, BLACK, WHITE, WHITE, WHITE,
        BLACK, WHITE, WHITE, WHITE, WHITE,
        BLACK, BLACK, BLACK, BLACK, BLACK,
    ]
};
const SPACE = {
    pitch: 3,
    buffer: [
        WHITE, WHITE, WHITE,
        WHITE, WHITE, WHITE,
        WHITE, WHITE, WHITE,
        WHITE, WHITE, WHITE,
        WHITE, WHITE, WHITE,
        WHITE, WHITE, WHITE,
        WHITE, WHITE, WHITE,
    ]
};
const EXCLAMATION = {
    pitch: 3,
    buffer: [
        WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE,
        WHITE, BLACK, WHITE,
        WHITE, WHITE, WHITE,
        WHITE, BLACK, WHITE,
    ]
};
const letters = {
    'A': A,
    'B': B,
    'C': C,
    'D': D,
    'E': E,
    'F': F,
    'G': G,
    'H': H,
    'I': I,
    'J': J,
    'K': K,
    'L': L,
    'M': M,
    'N': N,
    'O': O,
    'P': P,
    'Q': Q,
    'R': R,
    'S': S,
    'T': T,
    'U': U,
    'V': V,
    'W': W,
    'X': X,
    'Y': Y,
    'Z': Z,
    ' ': SPACE,
    '!': EXCLAMATION
};

var GameFrame = {
    data: {
        rendering: {
            nextId      : 1,
            mapping     : {},
            imageData   : [],
        },
        canvas  : null,
        width   : 450,
        height  : 300,
    },
    init: function(canvas)
    {
        var context = this,
            x       = 0,
            y       = 0,
            padding = 5,
            scale   = 5;

        this.data.canvas        = canvas;
        this.data.canvas.width  = this.data.width;
        this.data.canvas.height = this.data.height;

        Object.keys(letters).forEach(function(letter)
        {
            var letterBitmap = letters[letter];

            context.addRawBitmap(letterBitmap.buffer, letterBitmap.pitch, scale, letter);
        });

        ['H', 'E', 'L', 'L', 'O', ' ', 'W', 'O', 'R', 'L', 'D', '!'].forEach(function(letter)
        {
            var bitmap = context.getBitmapByName(letter);

            if(x >= context.data.width)
            {
                x = 0;
                y += (7 * scale) + padding;
            }

            if(bitmap)
            {
                context.renderBitmap(bitmap, x, y);
                x += bitmap.data.width + padding;
            }
            else
            {
                x += 15 + padding;
            }
        });
    },
    renderBitmap: function(bitmap, x, y)
    {
        var canvasContext = this.data.canvas.getContext('2d');

        switch(bitmap.type)
        {
            case 'imageData':
                canvasContext.putImageData(bitmap.data, x, y);
                break;
        }
    },
    getBitmapById: function(id)
    {
        var mapping = this.data.rendering.mapping[id];

        if(mapping !== undefined && 'type' in mapping && 'id' in mapping && this.data.rendering[mapping.type] !== undefined)
        {
            return {
                type    : mapping.type,
                data    : this.data.rendering[mapping.type][mapping.id]
            };
        }

        return null;
    },
    getBitmapByName: function(name)
    {
        var mapping = Object.values(this.data.rendering.mapping).find(function(mapping)
        {
            return mapping.name === name;
        });

        if(mapping !== undefined && 'type' in mapping && 'id' in mapping && this.data.rendering[mapping.type] !== undefined)
        {
            return {
                type    : mapping.type,
                data    : this.data.rendering[mapping.type][mapping.id]
            };
        }

        return null;
    },
    addRawBitmap: function(array, pitch, scale, name)
    {
        var id          = this.data.rendering.nextId++,
            bufferArray = [],
            width       = pitch,
            height      = array.length / width;

        scale   = (scale !== undefined) ? scale : 1;
        name    = (name !== undefined) ? name : 'Image-' + id;
        width   *= scale;
        height  *= scale;

        var canvasContext   = this.data.canvas.getContext('2d'),
            idata           = canvasContext.createImageData(width, height);

        for(var iy = 0; iy < height; iy++)
        {
            var y = Math.floor(iy / scale);

            for(var ix = 0; ix < width; ix++)
            {
                var x       = Math.floor(ix / scale),
                    pixel   = array[(y * pitch) + x];

                bufferArray = bufferArray.concat(pixel);
            }
        }

        idata.data.set(bufferArray);

        this.data.rendering.mapping[id] = {
            id      : id,
            name    : name,
            type    : 'imageData',
        };
        this.data.rendering.imageData[id] = idata;

        return id;
    }
};