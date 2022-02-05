class ModalDetail extends HTMLElement {
    constructor() {
        super()
        this.shadow = this.attachShadow()
    }

    connectedCallback() {
        this.render()
    }

    render() {
        this.shadow.innerHTML = `
            <h1>testing woi</h1>
        `
    }
    
}

customElements.define("modal-detail", ModalDetail)