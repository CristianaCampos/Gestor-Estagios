class CssClassManager {
    constructor(elementId) {
        this.elementId = elementId;
    }

    addClassToElementId(newClass) {
        this.elementId.classList.add(newClass);
    }

    removeClassFromElementId(oldClass) {
        this.elementId.classList.remove(oldClass);
    }
}
