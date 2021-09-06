<div>
    <div class="pt_10 pr_10 pl_10">
        <div class="rowc">
            <div class="xl-6">
                <div class="ds_f" v-if="staff.id">
                    <div class="w_150">
                        <img v-for="image()" class="wp_100 box-s4" :src="image()" alt="">
                        <div class="ds_f">
                        </div>
                    </div>
                    <div>
                        <div class="pl_10 fm-smreap">
                            <div class="ds_f">
                                <div class="w_100">ឈ្មោះ</div>
                                <div> : {{staff.name}}</div>
                            </div>
                            <div class="ds_f">
                                <div class="w_100">ភេទ</div>
                                <div> : {{staff.gender === "male" ? "ប្រុស" : "ស្រី"}}</div>
                            </div>
                            <div class="ds_f">
                                <div class="w_100">ផ្នែក</div>
                                <div> : {{staff.department === "" ? "N/A" : staff.department}}</div>
                            </div>
                            <div class="ds_f">
                                <div class="w_100">លេខទូរស័ព្ទ</div>
                                <div> : {{staff.tel === null ? "N/A" : staff.tel}}</div>
                            </div>
                            <div class="ds_f">
                                <div class="w_100">ថ្ងៃខែឆ្នាំកំណើត</div>
                                <div> : {{staff.birthdate === "" ? "N/A" : staff.birthdate}}</div>
                            </div>
                            <div class="ds_f">
                                <div class="w_100">ថ្ងៃចូលធ្វើការ</div>
                                <div> : {{staff.start_date === "" ? "N/A" : staff.start_date}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
