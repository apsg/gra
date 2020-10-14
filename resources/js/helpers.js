import {COLLISION_THRESHOLD} from "./constants";

export function collision(rect1, rect2) {
    if (rect1.right < rect2.left)
        return false;

    if (rect1.left > rect2.right)
        return false;

    if (rect1.bottom < rect2.top)
        return false;

    if (rect1.top > rect2.bottom)
        return false;

    if (Math.abs(rect1.left - rect2.right) < COLLISION_THRESHOLD) {
        return {
            x: -1,
            y: 0,
        }
    }

    if (Math.abs(rect1.right - rect2.left) < COLLISION_THRESHOLD) {
        return {
            x: -1,
            y: 0,
        }
    }

    if (Math.abs(rect1.top - rect2.bottom) < COLLISION_THRESHOLD) {
        return {
            x: 0,
            y: -1,
        }
    }

    if (Math.abs(rect1.bottom - rect2.top) < COLLISION_THRESHOLD) {
        return {
            x: 0,
            y: -1,
        }
    }

    return {
        x: -1,
        y: -1
    }
}

export function center(rect) {
    return {
        x: (rect.left + (rect.right - rect.left) / 2),
        y: (rect.bottom + (rect.top - rect.bottom) / 2),
    }
}
