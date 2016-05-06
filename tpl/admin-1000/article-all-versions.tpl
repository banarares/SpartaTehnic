
    <div id="English" class="tab-pane fade in active">
        <h2>{$article.title}</h2>
        <p>All versions from last -> first</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Version content</th>
                <th width="120">Version date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>
                    <div class="version_holder">{$article.version_1}</div>
                </td>
                <td>{$article.version_1_date}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>
                    {if $article.version_2 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 2, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_2}</div></td>
                <td>{$article.version_2_date}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>
                    {if $article.version_3 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 3, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_3}</div></td>
                <td>{$article.version_3_date}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>
                    {if $article.version_4 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 4, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_4}</div></td>
                <td>{$article.version_4_date}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>
                    {if $article.version_5 != ''} <div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 5, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_5}</div></td>
                <td>{$article.version_5_date}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>
                    {if $article.version_6 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 6, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_6}</div></td>
                <td>{$article.version_6_date}</td>
            </tr>
            <tr>
                <td>7</td>
                <td>
                    {if $article.version_7 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 7, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_7}</div></td>
                <td>{$article.version_7_date}</td>
            </tr>
            <tr>
                <td>8</td>
                <td>
                    {if $article.version_8 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 8, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_8}</div></td>
                <td>{$article.version_8_date}</td>
            </tr>
            <tr>
                <td>9</td>
                <td>
                    {if $article.version_9 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 9, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_9}</div></td>
                <td>{$article.version_9_date}</td>
            </tr>
            <tr>
                <td>10</td>
                <td>
                    {if $article.version_10 != ''}<div><button class="btn-danger btn button-margin" onclick="revert_article_to_version('{$article.article_id}', 10, '{$section_type}')">Revert to this version</button></div>{/if}
                    <div class="version_holder">{$article.version_10}</div></td>
                <td>{$article.version_10_date}</td>
            </tr>
            </tbody>
        </table>
    </div>
