/*
   Deluxe Menu Data File
   Created by Deluxe Tuner v3.10
   http://deluxe-menu.com
*/



//--- Common
var menuIdentifier="light-menu";
var isHorizontal=1;
var smColumns=1;
var smOrientation=0;
var dmRTL=0;
var pressedItem=-2;
var itemCursor="pointer";
var itemTarget="_self";
var statusString="link";
var blankImage="light-menu.files/blank.gif";
var pathPrefix_img="";
var pathPrefix_link="";

//--- Dimensions
var menuWidth="";
var menuHeight="";
var smWidth="";
var smHeight="";

//--- Positioning
var absolutePos=0;
var posX="10px";
var posY="10px";
var topDX=1;
var topDY=-4;
var DX=0;
var DY=0;
var subMenuAlign="left";
var subMenuVAlign="top";

//--- Font
var fontStyle=["normal 12px arial"];
var fontColor=["#000","#ccc"];
var fontDecoration=["none","none"];
var fontColorDisabled="#AAAAAA";

//--- Appearance
var menuBackColor="";
var menuBackImage="";
var menuBackRepeat="repeat";
var menuBorderColor="#C0AF62";
var menuBorderWidth="0px";
var menuBorderStyle="none";
var smFrameImage="";
var smFrameWidth=0;

//--- Item Appearance
var itemBackColor=["#6E859B","#8A9DB0"];
var itemBackImage=["",""];
var itemSlideBack=0;
var beforeItemImage=["",""];
var afterItemImage=["",""];
var beforeItemImageW="";
var afterItemImageW="";
var beforeItemImageH="";
var afterItemImageH="";
var itemBorderWidth="1px 0px 1px 0px";
var itemBorderColor=["#869AAE #869AAE #5C6F83 #869AAE","#869AAE #869AAE #5C6F83 #869AAE"];
var itemBorderStyle=["solid","solid"];
var itemSpacing=0;
var itemPadding="0px 13px 3px 4px";
var itemAlignTop="left";
var itemAlign="left";

//--- Icons
var iconTopWidth="";
var iconTopHeight="";
var iconWidth="";
var iconHeight="";
var arrowWidth="";
var arrowHeight="";
var arrowImageMain=["",""];
var arrowWidthSub=8;
var arrowHeightSub=9;
var arrowImageSub=["light-menu.files/arrow-n.gif","light-menu.files/arrow-o.gif"];

//--- Separators
var separatorImage="";
var separatorColor="";
var separatorWidth="100%";
var separatorHeight="0px";
var separatorAlignment="left";
var separatorVImage="";
var separatorVColor="";
var separatorVWidth="0px";
var separatorVHeight="100%";
var separatorPadding="0px";

//--- Floatable Menu
var floatable=0;
var floatIterations=6;
var floatableX=1;
var floatableY=1;
var floatableDX=15;
var floatableDY=15;

//--- Movable Menu
var movable=0;
var moveWidth=12;
var moveHeight=20;
var moveColor="#DECA9A";
var moveImage="";
var moveCursor="move";
var smMovable=0;
var closeBtnW=15;
var closeBtnH=15;
var closeBtn="";

//--- Transitional Effects & Filters
var transparency="100";
var transition=103;
var transOptions="";
var transDuration=350;
var transDuration2=200;
var shadowLen=0;
var shadowColor="#B1B1B1";
var shadowTop=0;

//--- CSS Support (CSS-based Menu)
var cssStyle=0;
var cssSubmenu="";
var cssItem=["",""];
var cssItemText=["",""];

//--- Advanced
var dmObjectsCheck=0;
var saveNavigationPath=1;
var showByClick=0;
var noWrap=1;
var smShowPause=200;
var smHidePause=1000;
var smSmartScroll=1;
var topSmartScroll=0;
var smHideOnClick=1;
var dm_writeAll=1;
var useIFRAME=0;
var dmSearch=0;

//--- AJAX-like Technology
var dmAJAX=0;
var dmAJAXCount=0;
var ajaxReload=0;

//--- Dynamic Menu
var dynamic=0;

//--- Popup Menu
var popupMode=0;

//--- Keystrokes Support
var keystrokes=0;
var dm_focus=1;
var dm_actKey=113;

//--- Sound
var onOverSnd="";
var onClickSnd="";

var itemStyles = [
    ["itemHeight=39px","itemBackColor=transparent,transparent","itemBackImage=light-menu.files/left-normal.png,light-menu.files/left-over.png","itemSlideBack=10","itemBorderWidth=0px","itemBorderStyle=none,none","fontStyle='normal 13px Trebuchet MS, Tahoma','normal 13px Trebuchet MS, Tahoma'","fontColor=#E5E9ED,#FFFFFF"],
    ["itemHeight=39px","itemBackColor=transparent,transparent","itemBackImage=light-menu.files/right-normal.png,light-menu.files/right-over.png","itemSlideBack=10","itemBorderWidth=0px","itemBorderStyle=none,none","fontStyle='normal 13px Trebuchet MS, Tahoma','normal 13px Trebuchet MS, Tahoma'","fontColor=#E5E9ED,#FFFFFF"],
    ["itemHeight=39px","itemBackColor=transparent,transparent","itemBackImage=light-menu.files/back-normal.png,light-menu.files/back-over.png","itemSlideBack=3","itemBorderWidth=0px","itemBorderStyle=none,none","fontStyle='normal 13px Trebuchet MS, Tahoma','normal 13px Trebuchet MS, Tahoma'","fontColor=#E5E9ED,#FFFFFF"],
];
var menuStyles = [
    ["menuBackColor=#6E859B","menuBorderWidth=1px","menuBorderStyle=solid","menuBorderColor=#4E637A","itemSpacing=0","itemPadding=5px 10px"],
];
dm_init();