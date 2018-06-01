module.exports = function Item({id, name, description, image_url, category_id}) {
    this.id = id;
    this.name = name;
    this.description = description;
    this.image_url = image_url;
    this.category_id = category_id;
}