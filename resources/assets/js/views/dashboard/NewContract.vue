<template>
    <el-form ref="form" :model="form" label-position="top" label-width="120px">
        <el-row :gutter="20" class="center-section">
            <el-col :span="11">
                <div>
                    <el-col :span="11">
                        <el-form-item label="Release:">
                            <el-input v-model="form.name"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="11">
                        <el-form-item label="Precio:">
                            <el-input v-model="form.name"></el-input>
                        </el-form-item>
                    </el-col>

                </div>
                <el-form-item>
                    <el-col :span="11">
                        <el-date-picker type="date" placeholder="Fecha de inicio" v-model="date1" style="width: 100%;"></el-date-picker>
                    </el-col>
                    <el-col :span="11">
                        <el-date-picker type="date" placeholder="Fecha de fin" v-model="date1" style="width: 100%;"></el-date-picker>
                    </el-col>
                </el-form-item>
            </el-col>
            <el-form-item label="Servicio:">
                <el-select v-model="form.region" placeholder="Servicio">
                    <el-option label="Zone one" value="shanghai"></el-option>
                    <el-option label="Zone two" value="beijing"></el-option>
                </el-select>
            </el-form-item>
        </el-row>
    </el-form>
</template>
<script>
    export default {
        data(){
            return {};
        }
    }
</script>
