assets_folder
=============

An Expression Engine fieldtype to assign an Assets folder ID to an entry, allowing output of an Assets folder hierarchy on a per entry basis.

Usage
------------
```
<ul>
    {exp:assets:folders parent_id="{asset_field}"}
        <li>
            <a href="{path=assets/view/{folder_id}}">{folder_name}</a>
            {if total_subfolders}
                <ul>
                    {subfolders}
                </ul>
            {/if}
        </li>
    {/exp:assets:folders}
</ul>
```