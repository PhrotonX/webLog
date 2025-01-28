const PictureSize = Object.freeze({
    Small: "PictureSize.Small",
    Medium: "PictureSize.Medium",
    Large: "PictureSize.Large",
} as const);

class Picture {
    constructor() {
    }

    /**
     * @param picturePath The path to an image.
     * @param size The size of an image. Expects a string within PictureSize.
     * @returns A shrunk image.
     */
    shrink(picturePath: string, size: typeof PictureSize[keyof typeof PictureSize]) {
        
    }
}

export const picture = new Picture();