"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.picture = void 0;
var PictureSize = Object.freeze({
    Small: "PictureSize.Small",
    Medium: "PictureSize.Medium",
    Large: "PictureSize.Large",
});
var Picture = /** @class */ (function () {
    function Picture() {
    }
    /**
     * @param picturePath The path to an image.
     * @param size The size of an image. Expects a string within PictureSize.
     * @returns A shrunk image.
     */
    Picture.prototype.shrink = function (picturePath, size) {
    };
    return Picture;
}());
exports.picture = new Picture();
