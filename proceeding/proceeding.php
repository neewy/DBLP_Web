<?php session_start();
	if(isset($_SESSION['login_user'])){ ?>
<div class="datatable_wrapper" style="display:none">
                <form class="pure-form">
                        <fieldset>
                            <legend id="proceeding-legend">Showing 50 results with offset <?php echo($_SESSION['proceeding_offset']);?></legend>
                            <label for="proceeding-field">Field</label>
                            <select id="proceeding-field">
                                <option>Key</option>
                                <option value="mdate">Date</option>
                                <option>Title</option>
                                <option>Year</option>
                                <option>Publisher</option>
                                <option>ISBN</option>
                            </select>
                            <input type="text" id="proceeding-search-value" class="pure-input-1-3" placeholder="Search value">
                            <label for="proceeding-match">
                                <input id="proceeding-match" type="checkbox"> Exact match
                            </label>
                            <a id="proceeding_search" class="pure-button pure-button-primary">Search</a>
                        </fieldset>
                </form>	
				<table id="sortTable" class="datatable pure-table pure-table-bordered tablesorter">
					<thead>
						<tr>
							<th>Editor</th>
							<th>Title</th>	
							<th>Date</th>
							<th>Year</th>
							<th>Publisher</th>
							<th>ISBN</th>
							<th>Series</th>
						</tr>
					</thead>
					<tbody id="datatable_body">
					</tbody>
				</table>
</div>
<?php } else {
		echo("<h2>Please, log into the system</h2>");
	} ?>