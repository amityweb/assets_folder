assets_folder
=============

An Expression Engine fieldtype to assign an Assets folder ID to an entry, allowing output of an Assets folder hierarchy on a per entry basis.

Installation
------------
- Download file and upload to system/third_party/assets_folder/ folder
- Install via Addons -> Fieldtypes
- Add the field as you would any channel entry field
- In the entry just choose which parent folder you want to associate with the entry

Usage
------------
```
<ul>
    {exp:assets:folders parent_id="{assets_folder}"}
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