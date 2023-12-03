
export class HtmlLoader 
{
    constructor(url, containerId){
        this.url = url;
        this.containerId = containerId;
        this.code
    }

    insertHtml()
    {
        fetch(this.url).then(response => response.text())
            .then(htmlCode => {
                
                var container = document.getElementById(this.containerId);
                
                container.innerHTML = htmlCode;

            }).catch(error => console.error("Ошибка, ты где то проебался", error))
    }
}


