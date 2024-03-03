<?php
// Contains the footer for all the views
?>
    <footer class="bg-black p-5">
            <div class="container pl-4 pr-4 sm:pl-4 sm:pr-4 md:mx-auto">
                <div class="flex flex-row justify-start">
                    <div class="w-3/6 md:w-2/6 lg:w-4/12 truncate">
                        <p class="text-slate-400 text-sm font-sarabun" title="<?php bloginfo('name') ?>">&copy; <?php echo date_i18n('Y'); ?>
                            <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name') ?></a>
                        </p>
                    </div>
                    <div class="hidden md:block md:w-2/6 lg:w-4/12">
                        <ul class="flex justify-between gap-1 md:gap-0 lg:justify-center lg:gap-16 overflow-scroll">
                            <?php
                                $menu_items = ink_get_nav_menu_items('footer');

                                if ($menu_items):
                                    foreach ($menu_items as $menu_item):
                                        $menu_path = parse_url($menu_item->url, PHP_URL_PATH);
                            ?>
                            <li>
                                <a href="<?php echo $menu_item->url; ?>" class="font-saira font-semibold text-slate-400 py-4 dark:text-gray-400">
                                    <?php echo $menu_item->title; ?>
                                </a>
                            </li>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div class="w-3/6 md:w-2/6 lg:w-4/12">
                        <ul class="flex flex-row justify-end gap-6 md:gap-6">
                            <li>
                                <a href="mailto:ntimobedyeboah@gmail.com" target="_blank" class="text-slate-400 font-medium py-4 hover:border-b-4 border-gray-300 dark:text-gray-400">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="w-5 h-5"
                                        width="20"
                                        height="20"
                                    >
                                        <path
                                            d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"
                                        />
                                        <path
                                            d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"
                                        />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/ntimyeboah/" target="_blank" class="text-slate-400 font-medium py-4 hover:border-b-4 border-gray-300 dark:text-gray-400">
                                    <svg
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        class="w-5 h-5"
                                    >
                                        <path
                                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"
                                        />
                                </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/NtimYeboah" target="_blank" class="text-slate-400 font-medium py-4 hover:border-b-4 border-gray-300 dark:text-gray-400">
                                    <svg
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                    >
                                            <path
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                                            />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/ntimdev" target="_blank" class="text-slate-400 font-medium py-4 hover:border-b-4 border-gray-300 dark:text-gray-400">
                                    <svg
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"
                                        />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
