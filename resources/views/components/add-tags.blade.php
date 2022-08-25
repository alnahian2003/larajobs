<div
    x-data
    data-tags='[]'
    class="max-w-lg"
>
    <div
        x-data="tagSelect()"
        x-init="init('parentEl')"
        @click.away="clearSearch()"
        @keydown.escape="clearSearch()"
    >
        <div class="relative" @keydown.enter.prevent="addTag(textInput)">
            <input
                x-model="textInput"
                x-ref="textInput"
                @input="search($event.target.value)"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Example: Laravel, Backend, Postgres, etc"
                name="tags"
            />
            <div :class="[open ? 'block' : 'hidden']">
                <div class="absolute z-40 left-0 mt-2 w-full">
                    <div
                        class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300"
                    >
                        <a
                            @click.prevent="addTag(textInput)"
                            class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white"
                            >Add tag "<span
                                class="font-semibold"
                                x-text="textInput"
                            ></span
                            >"</a
                        >
                    </div>
                </div>
            </div>
            <!-- selections -->
            <template x-for="(tag, index) in tags">
                <div
                    class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1"
                >
                    <span
                        class="ml-2 mr-1 leading-relaxed truncate max-w-xs"
                        x-text="tag"
                    ></span>
                    <button
                        @click.prevent="removeTag(index)"
                        class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none"
                    >
                        <svg
                            class="w-6 h-6 fill-current mx-auto"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"
                            />
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
    function tagSelect() {
        return {
            open: false,
            textInput: "",
            tags: [],
            init() {
                this.tags = JSON.parse(
                    this.$el.parentNode.getAttribute("data-tags")
                );
            },
            addTag(tag) {
                tag = tag.trim();
                if (tag != "" && !this.hasTag(tag)) {
                    this.tags.push(tag);
                }
                this.clearSearch();
                this.$refs.textInput.focus();
                this.fireTagsUpdateEvent();
            },
            fireTagsUpdateEvent() {
                this.$el.dispatchEvent(
                    new CustomEvent("tags-update", {
                        detail: { tags: this.tags },
                        bubbles: true,
                    })
                );
            },
            hasTag(tag) {
                var tag = this.tags.find((e) => {
                    return e.toLowerCase() === tag.toLowerCase();
                });
                return tag != undefined;
            },
            removeTag(index) {
                this.tags.splice(index, 1);
                this.fireTagsUpdateEvent();
            },
            search(q) {
                if (q.includes(",")) {
                    q.split(",").forEach(function (val) {
                        this.addTag(val);
                    }, this);
                }
                this.toggleSearch();
            },
            clearSearch() {
                this.textInput = "";
                this.toggleSearch();
            },
            toggleSearch() {
                this.open = this.textInput != "";
            },
        };
    }
</script>
