<style>
    @font-face {
        font-family:AlexBrush;
        src:url(http://localhost/internet-research/fonts/AlexBrush.ttf)
    }
    
    body {
        background-color: #3399FF;
        font-family:"Open Sans Light", Candara, Arial, sans-serif;
        margin:0;
        padding:0;
        /* Open Sans Light */
    }
    
    header {
        background-color:#F7FBFF;
        border-radius:15px;
        margin:20px auto 0 auto;
        width:94%;
        height:111px;
    }
    
    h3 {
        display:block;
        color:#5C00E6;
    }
    
    div#logo {
        padding:30px 0 0 0;
        text-align:center;
        font-family:AlexBrush;
        font-size:2em;
        color:#4d4e53;
        font-weight:bold;
    }
    
    .oblique {
        font-style:oblique;
    }
    
    
    
    
/*NAVIGATION*/    
    nav {
        border-radius:50px;
        width:98%;
        position:absolute;
        top:88px;
        left:1%;
        background-color:#4d4e53;
        padding:3px 0px 3px 0px;
    }

    ul#main-nav {
        list-style-type: none;
        margin:0;
        padding:0 3% 0 3%;
        overflow:hidden;
    }

    li.navbutton {
        float: left;
        border-right: 5px solid #4d4e53;
    }
    
    li.currentpage {
        text-align:center;
        font-size:1.25em;
        color:#F7FBFF;
        float:left;
        padding:7px 0 0 21px;
    }
        
    li:last-child.navbutton {
    }

    li a.navlink {
        display: block;
        border-radius:5px;
        color: #3399ff;
        text-align: center;
        padding-top: 12px;
        padding-bottom: 3px;
        padding-right: 5px;
        padding-left: 25px;
        background-color: #e6f2ff;
        text-decoration: none;
        font-size:1.1em;
        font-family:Candara, Arial, sans-serif;
        font-weight: bold;
    }
    
    li a.navactive {
        background-color: #5c00e6;
        color:#F7FBFF;
    }
    
    a.navlink:hover {
        background-color:#3399FF;
        color:#F7FBFF;
    }
    
    a.navactive:hover {
        background-color:#A676ED;
    }
            
    li.search-box {
        color:#F7FBFF;
        float:right;
    }
    
    li input {
        border-radius:3px;
        background-color:#F7FBFF;
        border:1px solid #3399FF;
    }
    
    
    
            
/* MAIN CONTENT AREA */    
    div#page-wrap {
        background-color:#F7FBFF;
        width:94%;
        margin:0 auto;
        padding:0px;
        border:0px solid #d1d1e0;
        overflow:auto;
    }
    
    section#side-panel {
        float:left;
        min-height:400px;
        width:330px;
        padding:10px;
        background-color:#4D4E53;
        border-top:0px solid #3399FF;
        color:white; 
    }
        
    div#side-top-box {
        width:320px;
        padding:5px;
        margin-bottom:15px;
    }
    
    div a.bluelink {
        color:#E6F2FF;
        text-decoration:none;
    }
    
    div a.bluelink:hover {
        color:#3399FF;
        padding-left:5px;
        transition-duration:0.25s;
    }
    
    div a.graylink {
        color:#4D4E53;
        text-decoration:none;
    }
    
    div a.graylink:hover {
        color:#5C00E6;
        padding-left:5px;
        transition-duration:0.25s;
    }
    
    div#side-middle-box {
        border-radius:10px;
        color:#4D4E53;
        overflow:auto;
        width:320px;
        background-color:#E2D5F5;
        border:0px solid #4d4e53;
        border-top:0px solid #C8D2DE;
        padding:5px 5px 15px 5px;
        margin:0 0 15px 0;
    }
    
    div#side-bottom-box {
        border-radius:10px;
        color:#4D4E53;
        overflow:auto;
        width:320px;
        background-color:#e6f2ff;
        border:0px solid #4d4e53;
        border-top:0px solid #C8D2DE;
        padding:5px 5px 15px 5px;
        margin:0 0 15px 0;
    }
    
    .scroll-container {
        background-color:rgba(51, 153, 255, 0.2);
        border-top:1px solid #3399FF;
        border-bottom:1px solid #A676ED;
        height:250px;
        overflow-y:scroll;
        margin:0 auto;
        padding:10px;
    }
    
    .add-link-input {
        border-radius:3px;
        background-color:#F7FBFF;
        border:1px solid #ABA5B5;
        width:100%;
        height:18px;
        margin-bottom:7px;
    }
    
    .add-link-input::-webkit-input-placeholder {
        color:#6A6D80;
        padding:0 5px;
    }
    
    .blue1 {
        background-color:#E6F2FF;
    }
    
    .blue2 {
        background-color:#CCE4FF;
    }
    
    .blue3 {
        background-color:#B3D7FF;
    }
    
    input.short {
        width:200px;
    }
    
    .left_column {
        width:160px;
        float:left;
    }
    
    .right_column {
        width:160px;
        float:left;
    }
    
/*CHECKBOX CODE - FROM STACKOVERFLOW*/
    input[type="checkbox"].sidelist {
        display: none;
    }
    
    label.taglabel {
        cursor: pointer;
        font-size:0.9em;
        color:#E6F2FF;
    }
    
    input[type="checkbox"].sidelist + label:before {
        border-radius:5px;
        border: 1px solid #E6F2FF;
        content: "\00a0";
        display: inline-block;
        font: 1em sans-serif;
        height: 14px;
        margin: 4px 4px 0 0;
        padding: 0;
        vertical-align: top;
        width: 14px;
    }
    input[type="checkbox"]:checked.sidelist + label.sidelabel:before {
        background: #E6F2FF;
        content: "\00a0";
        font-size:14px;
        text-align: center;
    }
    input[type="checkbox"]:checked.sidelist + label.sidelabel:after {
        font-weight: bold;
    }   
    input[type="checkbox"]:checked.dark-border {
        border:1px solid #4D4E53;
    }    
    
/* ADD BUTTON */
    input[type="submit"].link-submit {
        background:url(images/add_button.png);
        border:0;
        cursor:pointer;
        width:70px;
        height:40px;
        float:right;
    }
    
    input[type="submit"]:hover.link-submit {
        background:url(images/add_button_hover.png);
    }
    
/* EDIT/SAVE BUTTON */
    input[type="submit"].edit-submit {
        background:url(images/save_button.png);
        border:0;
        cursor:pointer;
        width:70px;
        height:40px;
        float:right;
    }
    
    div.edit-page-container {
        background-color:#B3B3FF;
        padding:10px;
        margin:15px;
    }
    
    span.edit-info-header {
        font-size:150%;
        font-weight:bold;
        color:#4D4E53;
    }
    
/* FILTER BUTTON */
    input[type="submit"].filter-submit {
        background:url(images/add_button.png);
        border:0;
        cursor:pointer;
        width:70px;
        height:40px;
        float:right;
    }
    
    input[type="submit"]:hover.link-submit {
        background:url(images/add_button_hover.png);
    }
    
    input[type="submit"]:hover.edit-submit {
        background:url(images/save_button_hover.png);
    }
    
    section#top-line {
        overflow:hidden;
        padding-top:5px;
        margin-bottom:15px;
    }

    div#top-line-content {
        width:99%;
        margin-left:auto;
    }
    
    div#top-note {
        padding:3px 40px;
        width:70%;
        margin:auto;
        border:3px solid #4d4e53;
        background-color:#b3b3ff;
        font-size:0.9em;
    }
    
    
    
    
/*FILTER TAGS*/
    .reset-pad-margin {
        padding:5px 5px 15px 5px;
        margin:0;
    }
    
    li.filter-tags {
        display:block;
    }
    
    input.filter-tag-checkbox {
        margin-right:1px;
    }
    
    label.filter-tag-label {
        color:#4d4e53;
        text-transform:uppercase;
        font-size:.75em;
    }
    
    
    
    
/*LINK OUTPUT TABLE*/
    section#results_table {
        overflow:hidden;
        margin:0 auto;
    }
    
    table#link_output {
        font-size:0.9em;
        table-layout:fixed;
        border-collapse:collapse;
        border-bottom:3px solid #4d4e53;
        border-left:1px solid #4d4e53;
        border-right:3px solid #4d4e53;
        width:98%;
        margin:0 auto;
    }
    
    table#link_output td {
        font-size:0.92em;
    }
    
    table#link_output tr, th, td {
        overflow:hidden;
        white-space:nowrap;
        text-overflow:ellipsis;
        border-right:1px solid #ABA5B5;
        padding:3px 0px 3px 5px;
    }

    table#link_output th {
        background-color:#5c00e6;
        color:#F7FBFF;
        transition:1s ease;
        height:20px;
    }
    
    table#link_output th.title {
        width:250px;
    }
    
    table#link_output th.title:hover {
        width:300px;
    }
    
    table#link_output th.shortdesc {
        width:275px;
    }
    
    table#link_output th.shortdesc:hover {
        width:475px;
    }
    
    table#link_output th.tags {
        width:150px;
        padding:0 10px;
    }
    
    table#link_output th.tags:hover {
        width:300px;
    }
    
    table#link_output th.notes {
        width:225px;
    }
    
    table#link_output th.notes:hover {
        width:475x;
    }
        
    td.align-left {
        text-align:left;
    }
    
    table#link_output th.edit {
        width:20px;
        padding:0px;
        text-align:center;
    }
    
    table#link_output th.delete {
        width:20px;
        padding:0px;
        text-align:center;
    }
   
    input[type="submit"].delete-x {
        color:#4d4e53;
        padding:0px;
        margin:0px;
        font-size:12px;
        border-top:1px solid #FAA850;
        border-right:3px solid #FAA850;
        border-bottom:3px solid #FAA850;
        border-left:1px solid #FAA850;
        background-color:#FFD3A3;
        height:16px;
        width:16px;
        cursor:pointer;
    }
    
    button[type="send"] {
        cursor:pointer;
        background:none; 
        border:0;
        height:20px;
        width:20px;
        margin:0 0 0 -3px;
        padding:0;
    }
    
    table#link_output tr:nth-child(even) {
        background-color:#E6F2FF;
    }
    
    table#link_output tr:nth-child(odd) {
        background-color:#CCE4FF;
    }
    
    table#link_output tr:hover {
        background-color:#b3b3ff;
    }
    
    table#link_output td:hover {
        white-space:normal;
        text-overflow:clip;
    }
    
    a.bookmark {
        font-size:1.1em;
        text-decoration:none;
        display:block;
        font-family:"Open Sans Light", Candara, Arial, sans-serif;
    }
    
    a.bookmark:hover {
        transition-duration:0.25s;
        font-weight:bold;
        padding-left:5px;
    }
    
    span.tagDisplay {
        font-size:.8em;
        font-weight:bold;
        text-overflow:clip;
        color:#4d4e53;
        background-color:#F2F8FF;
        border:1px solid #95969C;
        border-radius:25px;
        padding-left:7px;
        padding-right:7px;
        margin-right:7px;
        opacity:1;
    }
    
    footer {
        width:100%;
        padding:4px 0;
        background-color:#4D4E53;
        color:#ABA5B5;
        text-align:center;
        margin:10px 0 0 0;
    }
        
</style> 