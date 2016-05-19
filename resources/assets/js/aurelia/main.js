import 'bootstrap';
import  {ViewLocator} from 'aurelia-framework';

export function configure(aurelia) {
    aurelia.use
        .standardConfiguration()
        .developmentLogging();

    ViewLocator.prototype.convertOriginToViewUrl = (origin) => {
        let moduleId = origin.moduleId;

        let id = (moduleId.endsWith('.html')) ? 'views/'+moduleId : moduleId;

        return id;
    };
    //Uncomment the line below to enable animation.
    aurelia.use.plugin('aurelia-animator-css');

    //Anyone wanting to use HTMLImports to load views, will need to install the following plugin.
    //aurelia.use.plugin('aurelia-html-import-template-loader');

    aurelia.start().then(a => a.setRoot());
}
