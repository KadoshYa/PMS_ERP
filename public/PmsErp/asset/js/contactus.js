          var arCuMessages = ["Welcome!", "Please Visit Our Modules <br> to get more Informations!","Powered by plugins.areama.net"];
            var arCuPromptClosed = false;
            var arCuDelayFirst = 500;
            var _arCuTimeOut = null;
            var arCuDelayFirst = 2000;
            var arCuTypingTime = 2000;
            var arCuMessageTime = 4000;
            var arCuCloseLastMessage = false;
            var arCuLoop = false;
            function arCuShowMessage(index){
                if (arCuPromptClosed){
                    return false;
                }
                if (typeof arCuMessages[index] !== 'undefined'){
                    jQuery('#contact').contactUs('showPromptTyping');

                    _arCuTimeOut = setTimeout(function(){
                        if (arCuPromptClosed){
                            return false;
                        }
                        jQuery('#contact').contactUs('showPrompt', {
                            content: arCuMessages[index]
                        });
                        index ++;
                        _arCuTimeOut = setTimeout(function(){
                            if (arCuPromptClosed){
                                return false;
                            }
                            arCuShowMessage(index);
                        }, arCuMessageTime);
                    }, arCuTypingTime);
                }else{
                    if (arCuCloseLastMessage){
                        jQuery('#contact').contactUs('hidePrompt');
                    }
                    if (arCuLoop){
                        arCuShowMessage(0);
                    }
                }
            };
            function arCuShowMessages(){
                setTimeout(function(){
                    clearTimeout(_arCuTimeOut);
                    arCuShowMessage(0);
                }, arCuDelayFirst);
            }
            window.addEventListener('load', function(){
                $('#contact').on('arcontactus.init', function(){
                    $('#contact').addClass('arcuAnimated').addClass('flipInY');
                    setTimeout(function(){
                        $('#contact').removeClass('flipInY');
                    }, 2000);
                    arCuShowMessages();
                });
                $('#contact').contactUs({
                    drag: false,
                    //mode: 'callback',
                    //align: 'left',
                    reCaptcha: false,
                    menuSize: 'small',
                    buttonSize: 'small',
                    buttonText: false, //'contact<br/>us',
                    iconsAnimationSpeed: 2000,
                    menuHeaderText: 'Kuraztech Platforms ',
                    itemsIconType: 'rounded',
                    countdown: 0,
                    showMenuHeader: true,
                    showHeaderCloseBtn: true,
                    headerCloseBtnColor: '#ffffff',
                    headerCloseBtnBgColor: '#323435',
//                    #f26364
                    promptPosition: 'side',
                    theme: '#323435',
//                    #black
            
                    items: [
                        {
                            title: 'Kuraztech',
                            icon: '<i class="fa fa-globe"></i>',
//                            href: 'https://m.me/areamaDevelopment',
                            href: 'http://kuraztech.com/',
                            color: 'white'
                        },
                        {
                            title: 'Education',
                            icon: '<i class="fa fa-free-code-camp"></i>',
                            href: 'http://education.kuraztech.com/',
                            color: 'white'
                        },
                        {
                            title: 'News',
                           icon: '<i class="fa fa-newspaper-o"></i>',
                           href: 'http://news.kuraztech.com/',
                            color: 'white'
                        },
                        {
                            title: 'Forum',
                            icon: '<i class="fa fa-comments-o"></i>',
                            href: 'http://forum.kuraztech.com/',
                            color: 'white'
                        },
                        {
                            title: 'Document',
                            icon: '<i class="fa fa-book"></i>',
                            href: 'http://document.kuraztech.com/',
                            color: 'white'
                        },
                        {
                            title: 'AppStore',
                            icon: '<i class="fa fa-android"></i>',
                            href: 'http://appstore.kuraztech.com/',
                            color: 'white'
                        },
                         {
                            title: 'Graphics',
                            icon: '<i class="fa fa-paint-brush"></i>',
                            href: 'http://graphics.kuraztech.com/',
                            color: 'white'
                        },
                        {
                            title: 'Development',
                            icon: '<i class="fa fa-code"></i>',
                            href: 'http://development.kuraztech.com/',
                            color: 'white'
                        },
                        {
                            title: 'Freelance',
                            icon: '<i class="fa fa-connectdevelop"></i>',
                            href: 'http://freelance.kuraztech.com/',
                            color: 'white'
                        }
                    ]
                });
            });