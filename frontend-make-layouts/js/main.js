import { HtmlLoader } from "./HtmlLoader.js";

export const rootPath=''

const path = '/layout/layouts/';

const containers = [
    'header-id',
    'start-page-id',
]

function createHtml(container){
    
    let id = container;
    let file = container.replace('-id', '');
    
    return window[file + 'Id'] = new HtmlLoader(path + file + '.html', id);
}

containers.forEach(element => {
    createHtml(element).insertHtml();
});

