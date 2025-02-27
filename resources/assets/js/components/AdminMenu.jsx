import React, { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";
import { useTranslation } from "react-i18next";

export default function AdminMenu(_props) {
    const { items } = _props;
    const { t } = useTranslation();
    const [index, setIndex] = React.useState(null);

    React.useEffect(() => {
        console.log('items',items)
        items.map((item, i) => {
            if (item.active) {
                setIndex(i);
            }
        });
    }, []);

    return (
        <>
        <div>test</div>
            <ul className="nav navbar-nav">
                {items.map((item, i) => (
                    <li
                    key={i}
                        className={
                            item.children.length > 0
                                ? "dropdown" + (item.active ? " active" : "")
                                : "" + " " + index == i
                                ? "active"
                                : ""
                        }
                    >
                        <a
                            // target="item.target"
                            href={item.children.length > 0 ? "#" : item.href}
                            onClick={() => {
                                if (item.children.length > 0) {
                                    if (index == i) {
                                        setIndex(null);
                                    } else {
                                        setIndex(i);
                                    }
                                }
                            }}
                            aria-expanded={
                                item.children.length > 0 && index == i
                                    ? true
                                    : false
                            }
                        >
                            <span className={"icon " + item.icon_class}></span>
                            <span className="title"> {t(item.title)} </span>
                        </a>
                        {item.children.length > 0 && index == i && (
                            <>
                                <div
                                    className={
                                        "panel-collapse collapse" +
                                        (index == i ? " in" : " ")
                                    }
                                >
                                    <div className="panel-body">
                                        <AdminMenu
                                            items={item.children}
                                        ></AdminMenu>
                                    </div>
                                </div>
                            </>
                        )}
                    </li>
                ))}
            </ul>
        </>
    );
}

function isJson(jsonString) {
    if (!(jsonString && typeof jsonString === "string")) {
        return false;
    }

    try {
        JSON.parse(jsonString);
        return true;
    } catch (error) {
        return false;
    }
}

const container = document.querySelectorAll(".react-admin-menu");
if (container.length) {
    container.forEach((app, index) => {
        const root = createRoot(app);
        let props = Object.assign({}, app.dataset);
        console.log('props',props)
        Object.keys(props).forEach(function (key) {
            let i = 0;
            while (isJson(props[key]) && i <= 3) {
                props[key] = JSON.parse(props[key]);
                i++;
            }
        });
        root.render(<AdminMenu {...props} />);
    });
}
