
import bootstrap from './bootstrap';

import sticky from './app/sticky';

let ready = () => {
  sticky.init();
}

$(window).ready(ready);