import stickySidebar from 'sticky-sidebar'

const init = () => {
    $('.sticky').length ?
        getSticky() :
        0

    function getSticky() {
        const sidebar = new stickySidebar('.sticky', {
            minWidth: 991,
        });
    }
}

export default {
    init
}