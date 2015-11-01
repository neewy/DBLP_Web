<?php session_start();
	if(isset($_SESSION['login_user'])){ ?>
<div class="datatable_wrapper" style="display:none">
                <form class="pure-form">
                    <fieldset>
                        <legend id="top-legend">Showing 50 results with offset <?php echo($_SESSION['article_offset']);?></legend>

                         <label for="article-field">Field</label>
                        <select id="article-field">
                            <option>Key</option>
                            <option value="mdate">Date</option>
                            <option>Title</option>
                            <option>Year</option>
                            <option>Author</option>
                            <option>Journal</option>
                            <option>Volume</option>
                            <option>Number</option>
                            <option value="cite">Citation key</option>
                            <option>Publisher</option>
                            <option value="crossref">Cross-reference key</option>
                        </select>
                        <input type="text" id="article-search-value" class="pure-input-1-3" placeholder="Search value">
                        <label for="article-match">
                            <input id="article-match" type="checkbox"> Exact match
                        </label>
                        <a id="article_search" class="pure-button pure-button-primary">Search</a>
                    </fieldset>
                </form>
				<table id="sortTable" class="datatable pure-table pure-table-bordered tablesorter">
					<thead>
						<tr>
							<th>Key</th>
							<th>Date</th>	
							<th>Title</th>
							<th>Year</th>
							<th>Journal</th>
							<th>Volume</th>
							<th>Number</th>
						</tr>
					</thead>
					<tbody id="datatable_body">
					</tbody>
				</table>
			</div>
	<?php } else {
		echo("<h2>Please, log into the system</h2>");
	} ?>