( function( $ ) {
    "use strict";
    var loginLogoutSettings= function(){
        var self = this;
        self.tabControl                 = $('.mstlilo-tab-control');
        self.tabContent                 = $('.mstlilo-tab-content');
        self.tabCurrent                 = $('#mstlilo-tab-current');
        self.userNameLabelText          = $('.mstteam-username-email-label-text');
        self.userNamePlaceHolder        = $('.mstteam-username-email-placeholder');
        self.passwordLabelText          = $('.mstteam-password-label-text');
        self.passwordPlaceHolder        = $('.mstteam-password-placeholder');
        self.remembermeLabelText        = $('.mstteam-rememberme-label-text');
        self.lostYourPasswordLink       = $('.mstteam-yourpassword-label-text');
        self.classTabControl            = '.mstlilo-tab-control';
        self.classCustomLoginField      = '.mstteam-custom-login-form-field';
        self.classUserNamePlaceholder   = '.show-hide-username-placeholder';
        self.classShortcodeAlert        = '.mstteam-input';
        self.stringClassTabActive   = 'mstlilo-tab-active';

      // INIT
        self.init = function(){   
          // CLICK BUTTON TAB CONTROL
            $(document).on('click', self.classTabControl,function(event){
              event.preventDefault();
              var _this = $(this);
              self.tabControl.removeClass(self.stringClassTabActive);
              self.tabContent.removeClass(self.stringClassTabActive);
              var tab_current = $(this).data('tab-current');
              self.tabCurrent.val(tab_current);
              _this.addClass(self.stringClassTabActive);
              $(_this.data('target')).addClass(self.stringClassTabActive);
              return false;
            });
            $(document).on('change', self.classCustomLoginField,function(event){
              event.preventDefault();
              var _this       = $(this),
                  type        = _this.data('type'),
                  ischecked   = this.checked; 
              switch (type) {
                case 'username-label':
                  self.showHide(ischecked, self.userNameLabelText);
                  break;
                case 'username-placeholder':
                  self.showHide(ischecked, self.userNamePlaceHolder);
                  break;
                case 'password-label':
                  self.showHide(ischecked, self.passwordLabelText);
                  break;
                case 'password-placeholder':
                  self.showHide(ischecked, self.passwordPlaceHolder);
                  break;
                case 'rememberme':
                  self.showHide(ischecked, self.remembermeLabelText);
                  break;
                case 'lostyourpassword':
                  self.showHide(ischecked, self.lostYourPasswordLink);
                  break;
                default:
                  break;
              }
              
            });
            $(document).on('change', self.classUserNamePlaceholder,function(event){
              event.preventDefault();
              this.checked ? self.userNamePlaceHolder.show() : self.userNamePlaceHolder.hide();
            });
            document.querySelector(self.classShortcodeAlert).addEventListener('click', self.copyClipboard);
            //TRIGGER  
            $(self.classCustomLoginField).trigger('change');
        };
        
        self.showHide = function (ischecked, element){
            ischecked ? element.show() : element.hide();
        };
        self.copyClipboard = function (){
          var copyText = $(self.classShortcodeAlert);
          copyText.select();
          document.execCommand("copy");
        }
    };
    
    jQuery(document).ready(function($) {
      var qvSettings = new loginLogoutSettings();
      qvSettings.init();
    });
  
  } )( jQuery );