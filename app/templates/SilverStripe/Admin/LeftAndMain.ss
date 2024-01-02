<!DOCTYPE html>
<html lang="$Locale.RFC1766">
<head>
    <% base_tag %>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0" />
    <title>$Title</title>
</head>
    <body class="loading cms" data-frameworkpath="$ModulePath(silverstripe/framework)"
          data-member-tempid="$CurrentMember.TempIDHash.ATT" <% if $GraphQLLegacy %>data-graphql-legacy="1"<% end_if %>
>
<% include SilverStripe\\Admin\\CMSLoadingScreen %>
<% if $SiteConfig.ShowStagingWarning %>
    <style>
        .cms-container {
            padding-top: 41px;
        }
        .cms-container:before {
            content: "<% if $SiteConfig.StagingWarningBarText %>$SiteConfig.StagingWarningBarText<% else %>Warning: this is a development/staging environment.<% end_if %>";
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            color: red;
            line-height: 20px;
            padding: 10px;
            text-align: center;
            background-color: rgba(255,0,0,0.05);
            border-bottom: 1px solid rgba(255,0,0,0.25);
            font-size: 13px;
            font-weight: 700;
        }
    </style>
<% end_if %>
<div class="cms-container" data-layout-type="custom">
    $Menu
    $Content
    $PreviewPanel
</div>
</body>
</html>
